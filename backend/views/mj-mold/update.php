<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MjMold */

$this->title = '修改类型: ' . $model->type;
$this->params['breadcrumbs'][] = ['label' => 'Mj Molds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tid, 'url' => ['view', 'id' => $model->tid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mj-mold-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
