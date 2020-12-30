<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="js/rem.js"></script> 
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/base.css"/>
    <link rel="stylesheet" type="text/css" href="css/page.css"/>
    <link rel="stylesheet" type="text/css" href="css/all.css"/>
    <link rel="stylesheet" type="text/css" href="css/mui.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<script type="text/javascript">
		$(window).load(function(){
			$(".loading").addClass("loader-chanage")
			$(".loading").fadeOut(300)
		})
	</script>
</head>
<!--loading页开始-->
<div class="loading">
	<div class="loader">
        <div class="loader-inner pacman">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
	</div>
</div>
<!--loading页结束-->
	<body>
		<div class="headertwo clearfloat" id="header">
			<a href="javascript:history.go(-1)" class="fl box-s"><i class="iconfont icon-arrow-l fl"></i></a>
			<p class="fl">登录</p>
		</div>
        <?php $form = ActiveForm::begin(['action' => ['login/index'],'method'=>'post',]); ?>
		<div class="sign clearfloat" id="main">
			<ul>
				<li class="clearfloat">
					<i class="iconfont icon-phone fl"></i>
					<input type="text" id="" name="tel" value="" placeholder="请输账号" class="fl phone" />
				</li>
				<li class="clearfloat">
					<i class="iconfont icon-lock fl"></i>
					<input type="text" id="" name="pwd" value="" placeholder="请输入密码" class="fl phone" />
				</li>
			</ul>

                <?= Html::submitButton('登陆', ['class' => 'pay-btn clearfloat']) ?>

            <?php ActiveForm::end(); ?>
			<div class="bottom clearfloat">
				<p class="fl">
					还不是会员？
					<a href="#">立即注册</a>
				</p>
				<a href="#" class="fr">忘记密码？</a>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
	<script type="text/javascript" src="js/jquery.SuperSlide.2.1.js" ></script>
	<script type="text/javascript" src="js/hmt.js" ></script>
</html>
