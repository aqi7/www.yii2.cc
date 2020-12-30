<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Alert;

 


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	     <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="css/morris-0.4.3.min.css">
    <script src="js/jquery-1.10.2.js"></script>
    <style type="text/css">

     #forms{clear:both;width:90%;margin:0 auto;max-width:350px}
    </style>
</head>
 
<?php $this->beginBody() ?>

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
 

    

      


<?php

//use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RhAdmin */
/* @var $form ActiveForm */
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="" style='color:white'>维修平台管理系统</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- /.navbar-collapse -->
</nav>

<div style="height:50px;"></div>

<div id="forms">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'ename') ?>
        <?= $form->field($model, 'pwd')->passwordInput() ?>
        
        <div class="form-group" style="text-align:center;"> 
         <?= Html::submitButton('登陆', ['class' => 'btn btn-primary']) ?>           
        </div>

 


    <?php ActiveForm::end(); ?>

</div><!-- admin-login -->





<!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->    <script src="js/raphael-min.js"></script>
    <script src="js/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

