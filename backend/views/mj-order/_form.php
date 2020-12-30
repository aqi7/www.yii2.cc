<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MjOrder;
/* @var $this yii\web\View */
/* @var $model backend\models\MjOrder */
/* @var $form yii\widgets\ActiveForm */
?>
 

<div class="mj-order-form">

    <?php $form = ActiveForm::begin(); ?>

 
	<?= $form->field($model, 'danwei')->textInput(['maxlength' => true,'list'=>'alldanwei','placeholder'=>'请输入单位名称']) ?>
	
    <?= $form->field($model, 'keshi')->textInput(['maxlength' => true,'list'=>'allkeshi','placeholder'=>'请输入科室名称']) ?>


    <?= $form->field($model, 'tel')->textInput(['maxlength' => true,'list'=>'alltel','placeholder'=>'请输入联系方式']) ?>


    <?= $form->field($model, 'content')->textInput(['maxlength' => true,'list'=>'allcontent','placeholder'=>'请输入维修内容']) ?>

	<?= $form->field($model, 'product')->textInput(['maxlength' => true,'list'=>'allproduct','placeholder'=>'请输入销售产品']) ?>

	<?= $form->field($model, 'price')->textInput(['maxlength' => true,'list'=>'allprice','placeholder'=>'请输入价格']) ?>

     <?php
	 if($up==0){ 
	 $model->dengji=1;
	 }?>
	<?=$form->field($model, 'dengji')->radioList(['1'=>'一般','2'=>'急','3'=>'紧急']) ?>


    <?php
	if($up==0){ 
	 $model->renwusta=1;
	 echo $form->field($model, 'renwusta')->radioList(['1'=>'新发 ']) ;
    }else{
	 echo  $form->field($model, 'renwusta')->radioList(['1'=>'新发 ','2'=>'已领','3'=>'处理中','4'=>'完成']) ;	
	}?>

	  <?php
	if($up==0){ 
	 $model->is_dy=0;
	 echo $form->field($model, 'is_dy')->radioList(['0'=>'未打印',1=>'打印']) ;
    }else{
	  echo $form->field($model, 'is_dy')->radioList(['0'=>'未打印',1=>'打印']) ;
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
 <?=$form->field($model,'aid')->textInput()->hiddenInput(['value'=>Yii::$app->session->get('eid')])->label(false); ?>



   <?= $form->field($model, 'beizhu')->textInput(['maxlength' => true]) ?>
   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

	<!-- <?php
	$alldata=MjOrder::find()->all();
	$danwei=[];
	$keshi=[];
	$tel=[];
	$product=[];
	$price=[];
 
    foreach($alldata as $rs){
	   $danwei[]=$rs->danwei;	
	   $keshi[]=$rs->keshi;
	   $tel[]=$rs->tel;
	   $content[]=$rs->content;
	   $product[]=$rs->product;
	   $price[]=$rs->price;
	}

	$danwei=array_unique($danwei);
	$keshi=array_unique($keshi);
	$tel=array_unique($tel);
	$content=array_unique($content);
	$product=array_unique($product);
	$price=array_unique($price);

	
	?>
    <datalist id="alldanwei" >
     <?php	 
	 foreach($danwei as $v){	  
	 ?>
      <option  value='<?=$v;?>'  label='<?=$v;?>' > </option> 
     <?php 
	 
	 }
	 ?>
	</datalist>

	<datalist id="allkeshi" >
     <?php	 
	 foreach($keshi as $v){	  
	 ?>
      <option value='<?=$v;?>' >
         </option> 
    <?php }?>
	</datalist>

	<datalist id="alltel" >
     <?php	 
	 foreach($tel as $v){	  
	 ?>
        <option value='<?=$v;?>' >
         </option> 
    <?php }?>
	</datalist>

	<datalist id="allcontent" >
     <?php	 
	 foreach($content as $v){	  
	 ?>
         <option value='<?=$v;?>' >
         </option> 
    <?php }?>
	</datalist>

	<datalist id="allproduct" >
     <?php	 
	 foreach($product as $v){	  
	 ?>
      <option value='<?=$v;?>' >
             </option> 
    <?php }?>
	</datalist>

	<datalist id="allprice" >
     <?php	 
	 foreach($price as $v){	  
	 ?>
      <option value='<?=$v;?>' >
            </option> 
    <?php }?>
	</datalist> -->


</div>
<script src="./assets/1ee688ce/jquery.js"></script> 

 
	