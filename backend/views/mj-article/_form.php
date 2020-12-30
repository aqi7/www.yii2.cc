<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MjArticle */
/* @var $form yii\widgets\ActiveForm */
?>
//引用js文件，注意自己的文件路径

<?php $this->registerJsFile('web/layui/layui.js');?>

<div class="mj-article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'time')->textInput(['value'=>$model->time?$model->time:date('Y-m-d H:i:s',time())]) ?>

    <?= //$form->field($model, 'type')->textInput(['maxlength' => true]) 
    $form->field($model, 'tid')->dropdownList(ArrayHelper::map($admin, "tid","type"),['prompt'=>"--请选择--"]);
    
    ?>    


    <?=$form->field($model, 'status')->radioList(['1'=>'已发布','2'=>'审核中']) ?>


    <?= $form->field($model, 'article')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'issuer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume')->textarea(['rows' => 6]) ?>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
   

</div>
