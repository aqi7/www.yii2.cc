<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Student */

$this->title = '添加学生';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'admin' => $admin,
        'data' =>$data,
    ]) ?>

</div>
