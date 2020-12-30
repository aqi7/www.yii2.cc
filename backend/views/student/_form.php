<?php

use backend\models\Student;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>
 
<div class="student-form">
<!-- 单选、多选、下拉、日期控件 -->
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id'=>'product-form',]]) ?>
    
    <?= $form->field($model, 'imageFile')->widget('common\widgets\file_upload\FileUpload') ?>

  


    <?= $form->field($model, 'sname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->radioList(['1'=>'男','2'=>'女']) ?>

   <?= $form->field($model, 'hid')->checkboxList(ArrayHelper::map($data,'hid', 'hobby'));?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rid')->dropdownList(ArrayHelper::map($admin, "rid", "rname"),['prompt'=>"--请选择--"]);?>

    <?= $form->field($model, 'idcard')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'createtime')->textInput() ?>
   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php $this->beginBlock('script') ?>
    layui.use('laydate', function(){
        var laydate = layui.laydate;
        //日期时间选择器
        laydate.render({
            elem: '#student-createtime'
            ,type: 'datetime'
        });
    });
    <?php $this->endBlock() ?>
    <?php $this->registerJs($this->blocks['script'], \yii\web\View::POS_END); ?>
</div>
