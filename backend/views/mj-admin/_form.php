<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MjAdmin */
/* @var $form yii\widgets\ActiveForm */
?>
 

<div class="mj-admin-form">

    <?php $form = ActiveForm::begin(); ?>


	  <?= $form->field($model, 'esno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pwd')->textInput(['maxlength' => true]) ?>

		<?=$form->field($model, 'type')->radioList(['1'=>'管理员','2'=>'商务','3'=>'技术','4'=>'其他单位']) ?>

    <?= $form->field($model, 'tel1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel2')->textInput(['maxlength' => true]) ?>

     <div class="form-group field-mjadmin-birth">
<label class="control-label" for="mjadmin-birth">生日</label>
<input type="date" id="mjadmin-birth" value='<?=$model->birth?$model->birth:''?>'  class="form-control" name="MjAdmin[birth]"> 

<div class="help-block"></div>
</div>
	<div class="form-group field-mjadmin-rzrq">
<label class="control-label" for="mjadmin-rzrq">入职日期</label>
<input type="date" id="mjadmin-rzrq" value='<?=$model->rzrq?$model->rzrq:''?>'   class="form-control" name="MjAdmin[rzrq]">

<div class="help-block"></div>
</div>
	
	<?=$form->field($model, 'status')->radioList(['1'=>'正常','2'=>'禁用']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
