<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MjTitle */

$this->title = 'Create Mj Title';
$this->params['breadcrumbs'][] = ['label' => 'Mj Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mj-title-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
