<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MjAdmin */

$this->title = $model->ename;
$this->params['breadcrumbs'][] = ['label' => 'Mj Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mj-admin-view">

    <h4>员工:<?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->eid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('禁用', ['delete', 'id' => $model->eid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要禁用此账号吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'eid',
			'esno',
            'ename',
            'pwd',
            'tel1',
            'tel2',
            'birth',
			 'rzrq',
			[
              'attribute' => 'type',
			  'format' => 'html',
			  'value' => function ($model) {
							   if(@$model->type==1){
							     return '管理员';
							   }else if(@$model->type==2){
							     return '商务';
							   }else if(@$model->type==3){
							     return '技术';
							   }else{
							     return '其他单位';
							   }
                                
                            }
                             
             ],
	 
			[
              'attribute' => 'status',
			  'format' => 'html',
			  'value' => function ($model) {
							   if(@$model->status==1){
							     return '正常';
							   }else{
							     return '禁用';
							   }
                                
                            }
                             
             ],
        ],
    ]) ?>

</div>
