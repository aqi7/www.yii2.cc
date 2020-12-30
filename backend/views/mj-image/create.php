<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MjImage */

$this->title = 'Create Mj Image';
$this->params['breadcrumbs'][] = ['label' => 'Mj Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mj-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
