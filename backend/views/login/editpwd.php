<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Alert;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
</head>
<body>
<?php
if( Yii::$app->getSession()->hasFlash('success') ) {
	echo Alert::widget([
		'options' => [
			'class' => 'alert-success', //这里是提示框的class
		],
		'body' => Yii::$app->getSession()->getFlash('success'), //消息体
	]);
}
if( Yii::$app->getSession()->hasFlash('error') ) {
	echo Alert::widget([
		'options' => [
			'class' => 'alert-error',
		],
		'body' => Yii::$app->getSession()->getFlash('error'),
	]);
}
?>
 
<div class="row">
    <div class="col-lg-12">
        <h1>员工<small>修改密码</small></h1>
        <ol class="breadcrumb">
       
            <li class="active"><i class="fa fa-edit"></i> 修改密码</li>
        </ol>
        <div class="alert alert-info alert-dismissable">修改密码</div>
    </div>
</div><!-- /.row -->
 
<div class="row">
    <div class="col-lg-4">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'yuanmi')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'xinmi')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'quemi')->passwordInput(['maxlength' => true]) ?>

    <br style="clear:both">
    <div class="form-group">
       <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
     </div>
     <?php ActiveForm::end(); ?>
 </div>
 </div>

<script>

 

 var yuyu = '';
 var xixi = '';
 var ququ = '';

$(function(){
     
   //查寻原密码
    $("#mjadmin-yuanmi").change(function(){ 
      $.get("<?=Url::toRoute('login/getmima')?>",{mi:$(this).val()},function(data){
        if(data ==402)
        {
            $("#mjadmin-yuanmi").val('');
            $(".field-mjadmin-yuanmi .help-block-error").html('原密码错误,请重新输入原密码...');
        }
        else
        {
            $(".field-mjadmin-yuanmi .help-block-error").html('原密码正确,请输入新密码...');
        }
    });
    });
    //验证新密码
   
    //判断新密码
    $("#mjadmin-quemi").change(function()
    {   
        var x =  $("#mjadmin-xinmi").val();
        var q = $(this).val();
        if(x != q)
        {
            $("#mjadmin-quemi").val('');
            var qqq ='两次输入的密码不一致！';
            $(".field-mjadmin-quemi .help-block-error").html(qqq);
        }
        else
        {
            $(".field-mjadmin-quemi .help-block-error").html('');
            ququ = 3;

           
        }
    });


    
  });

</script>


