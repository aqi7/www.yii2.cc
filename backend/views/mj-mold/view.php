<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MjMold */

$this->title = $model->type;
$this->params['breadcrumbs'][] = ['label' => 'Mj Molds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mj-mold-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('主页', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('修改', ['update', 'id' => $model->tid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->tid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tid',
            'type',
        ],
    ]) ?>

</div>
