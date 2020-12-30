<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\MjOrder */
/* @var $form yii\widgets\ActiveForm */
?>
 

<div class="mj-order-form">

    <?php $form = ActiveForm::begin(); ?>

  
    <?= $form->field($model, 'danwei')->textInput(['maxlength' => true]) ?>

	
    <?= $form->field($model, 'keshi')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'product')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    
	<?=$form->field($model, 'dengji')->radioList(['1'=>'一般','2'=>'急','3'=>'紧急']) ?>


    <?php
	if($up==0){ 
	 $model->renwusta=1;
	 echo $form->field($model, 'renwusta')->radioList(['1'=>'新发 ']) ;
    }else{
	 echo  $form->field($model, 'renwusta')->radioList(['1'=>'新发 ','2'=>'已领','3'=>'处理中','4'=>'完成']) ;	
	}?>

  	<?= $form->field($model, 'eid')->dropdownList(ArrayHelper::map($admin, "eid", "ename"),['prompt'=>"--请选择--"]);?>


	<?= $form->field($model, 'addtime')->textInput(['value'=>$model->addtime?$model->addtime:date('Y-m-d H:i:s',time())]) ?>
   <?php
   if(@$up==1){

   ?>
	<div class="form-group field-mjorder-ltime">
<label class="control-label" for="mjorder-ltime">领取时间</label>
<input type="date" id="mjorder-ltime" class="form-control" name="MjOrder[ltime]" value="<?=$model->ltime?$model->ltime:''?>">

<div class="help-block"></div>
</div>
	<div class="form-group field-mjorder-wtime">
<label class="control-label" for="mjorder-wtime">完成时间</label>
<input type="date" id="mjorder-wtime" value="<?=$model->wtime?$model->wtime:''?>" class="form-control" name="MjOrder[wtime]">

<div class="help-block"></div>
</div>
<?php }?>
 

   <?= $form->field($model, 'beizhu')->textInput(['maxlength' => true]) ?>

  

 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="./assets/1ee688ce/jquery.js"></script>  

<script>
$(function(){ 
	//alert(2);
  $("#mjorder-danwei").keydown(function(){
     $(this).val('2');
  
  });


});

</script>
