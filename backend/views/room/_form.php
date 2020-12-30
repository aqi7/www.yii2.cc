<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MjAdmin */
/* @var $form yii\widgets\ActiveForm */
?>
 

<div class="mj-admin-form">

    <?php $form = ActiveForm::begin(); ?>


	  <?= $form->field($model, 'rname')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
