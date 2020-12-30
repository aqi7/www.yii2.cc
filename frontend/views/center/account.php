<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>我的账单</title>
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
			<p class="fl">我的账单</p>
		</div>
		
		<div class="pay clearfloat" id="main">			
			<div class="land-ctent clearfloat pay-bottom">
				<ul>
					<li class="box-s clearfloat">
						<p class="tit fl">租房信息</p>
						<p class="xinxi fr"><?= !empty($model->room->build->bu_name)?$model->room->build->bu_name:''?></p>
					</li>
					<li class="box-s clearfloat">
						<p class="tit fl">房屋住址</p>
						<p class="xinxi fr"><?= !empty($model->room->r_address)?$model->room->r_address:''?></p>
					</li>
					<!--<li class="box-s clearfloat">
						<p class="tit fl">合同开始日</p>
						<input type="text" name="" id="" value="" placeholder="请选择合同开始日期" readonly="readonly" class="fl day" />
						<i class="iconfont icon-arrowright fl"></i>
					</li>
					<li class="box-s clearfloat">
						<p class="tit fl">合同结束日</p>
						<input type="text" name="" id="" value="" placeholder="请选择合同结束日期" readonly="readonly" class="fl day" />
						<i class="iconfont icon-arrowright fl"></i>
					</li>-->
					<li class="box-s clearfloat">
						<p class="tit fl">租房押金</p>
						<input type="text" name="" id="" value="" placeholder="<?= !empty($model->room->r_deposit)?$model->room->r_deposit:'0.00'?>元" class="fl day" disabled="disabled" />
					</li>
					<li class="box-s clearfloat">
						<p class="tit fl">每月租金</p>
						<p class="xinxi price fr"><?= !empty($model->bi_rent)?$model->bi_rent:'0.00'?>元</p>
					</li>
					<li class="box-s clearfloat">
						<p class="tit fl">水费</p>
						<p class="xinxi price fr"><?= !empty($model->bi_warter)?$model->bi_warter:'0.00'?>元</p>
					</li>
					<li class="box-s clearfloat">
						<p class="tit fl">电费</p>
						<p class="xinxi price fr"><?= !empty($model->bi_electric)?$model->bi_electric:'0.00'?>元</p>
					</li>
					<li class="box-s clearfloat">
						<p class="tit fl">网费</p>
						<p class="xinxi price fr"><?= !empty($model->bi_cost)?$model->bi_cost:'0.00'?>元</p>
					</li>				
					<li class="box-s clearfloat">
						<p class="tit fl">应付金额</p>
						<p class="xinxi price fr"><?= !empty($model->bi_total)?$model->bi_total:'0.00'?>元</p>
					</li>
				</ul>
				<a href="<?=Url::toRoute(['center/payment', 'id' =>Yii::$app->session['u_id'] ]);?>" class="pay-btn clearfloat">
					下一步
				</a>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
	<script src="js/fastclick.js"></script>
	<script src="js/mui.min.js"></script>
	<script type="text/javascript" src="js/hmt.js" ></script>
</html>
