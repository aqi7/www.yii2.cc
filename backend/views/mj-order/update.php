<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

 $form = ActiveForm::begin(); 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
  <!--  <script type="text/javascript">
$(function()
{
    
   var name=$("select option:nth-child(2)").hide();  
});

</script> -->

  </head>
  <body>
<div class="row">
    <div class="col-lg-12">
        <!-- <h1> 维修订单 <small>修改</small></h1> -->
        <ol class="breadcrumb">
            <li><a href="<?=Url::toRoute('mj-order/index');?>"><i class="fa fa-dashboard"></i> 维修订单信息列表</a>
            <li class="active"><i class="fa fa-edit"></i> 修改维修订单
        </ol>
        <div class="alert alert-info alert-dismissable">
            请修改维修订单
        </div>
         
    </div>
</div><!-- /.row -->

<div class="row">
<div class="manage-create">
    <div class="col-lg-12">
       <?= $this->render('_form', [
        'model' => $model,
		'admin' => $admin,
		'up'=>1
    ]) ?>
</div>