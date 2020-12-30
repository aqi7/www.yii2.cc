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
  </head>
  <body>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="<?=Url::toRoute('room/index');?>"><i class="fa fa-dashboard"></i> 班级信息列表</a>
            <li class="active"><i class="fa fa-edit"></i> 添加班级
        </ol>
        <div class="alert alert-info alert-dismissable">
            请添加班级
        </div>
         
    </div>
</div><!-- /.row -->

<div class="row">
<div class="manage-create">
    <div class="col-lg-12">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>