<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MjMold */

$this->title = '新增类型';
$this->params['breadcrumbs'][] = ['label' => 'Mj Molds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mj-mold-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
