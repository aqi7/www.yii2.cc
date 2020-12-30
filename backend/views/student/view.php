<?php

use backend\models\Hobby;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */

$this->title = $model->sname;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('主页', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('修改', ['update', 'id' => $model->sid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->sid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除学生'.$model->sname.'吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sid',
            [
                'attribute'=>'imageFile',
                "format" => ["image",
                            ["width"=>"150",]
                ],
                "value" => function ($model) { 
                    if($model->imageFile){
                        return $model->imageFile;
                    }else{
                        return 'uploads/1.jpg'; 
                    }
                    // return 'uploads/'.$model->imageFile; 
                }
            ],
            'sname',
            [
                'attribute' => 'sex',
                'value' => function($dataProvider) {
                    return $dataProvider->sex == 1 ? '男' : '女';
                }
            ], 
            [
                'attribute' => 'hid',
                'label'=>'爱好',
                'value'=>function ($model){
                    $dept=Hobby::find()
                            ->select(['hobby'])
                            ->where(['in','hid',$model->hid])
                            ->column();
                    return implode(',', $dept);
                }
                
            ],
            'phone',
            'address',
           'room.rname',
           'idcard',
           'createtime',
        ],
    ]) ?>

</div>
