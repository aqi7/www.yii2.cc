<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RProject */

 
?>
<div class="row">
    <div class="col-lg-12">
      
        <ol class="breadcrumb">
            <li><a href="javascript:history.go(-1);"><i class="fa fa-dashboard"></i> 返回</a></li>
            <li class="active"><i class="fa fa-edit"></i> 处理维修结果</li>
        </ol>
        <div class="alert alert-info alert-dismissable">
            处理维修结果
        </div>
    </div>
</div><!-- /.row -->

 
<div class="row">
    <div class="col-lg-12">


  <?php $form = ActiveForm::begin(); ?>

   <?=$form->field($model, 'renwusta')->radioList([3=>'处理中','4'=>'完成',5=>'未完成']) ;	
	?>

  
	<div class="form-group field-mjorder-wtime">
<label class="control-label" for="mjorder-wtime">处理时间</label>
<input type="date" id="mjorder-wtime" value="<?=date('Y-m-d',time())?>" class="form-control" name="MjOrder[wtime]">

<div class="help-block"></div>
</div>
 <?= $form->field($model, 'beizhu')->textArea(['rows' => '6']) ?>
   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : '提交', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

            <?php ActiveForm::end(); ?>

        
        </div>
</div>
  
 