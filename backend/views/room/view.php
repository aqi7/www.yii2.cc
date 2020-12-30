<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\MjAdmin */

$this->title = $model->rname;
$this->params['breadcrumbs'][] = ['label' => 'Room', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="<?=Url::toRoute('room/index');?>"><i class="fa fa-dashboard"></i> 班级信息列表</a>
            <li class="active"><i class="fa fa-edit"></i> 班级详情
        </ol>
       
    </div>
<div class="mj-admin-view col-lg-12">

    <h4>班级:<?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->rid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->rid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要删除此账号吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           'rid',
            'rname',
           
        ],
    ]) ?>

</div>
