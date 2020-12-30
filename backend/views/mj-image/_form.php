<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<table class="table table-bordered table-hover definewidth m10">
<tr>
   <td class="tableleft">上传多个图片</td>
   <td><?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

   </td>
</tr>

<tr>
   <td class="tableleft"></td>
   <td>
       <button type="submit" class="btn btn-primary" type="button">保存</button>
   </td>
</tr>

<?php ActiveForm::end() ?>