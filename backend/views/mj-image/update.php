<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MjImage */

$this->title = 'Update Mj Image: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mj Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mj-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
