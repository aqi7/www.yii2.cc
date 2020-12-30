<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>我的消息</title>
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
			<p class="fl">我的消息</p>
		</div>
		
		<div class="about clefloat" id="main">
			<?
			foreach ($data as $val) {
			?>
			<div class="p-list p-listwo clearfloat box-s">
				<a class="clearfloat" href=index.php?r=center/detail&id=<?= $val->me_id?>>
					<span class="fl"><?= !empty($val->me_title)?$val->me_title:'';?></span>
					<i class="iconfont icon-arrowright fr you"></i>
				</a>
			</div>
			<? }?>
			<?
			foreach ($model as $v) {
			?>
			<div class="p-list p-listwo clearfloat box-s">
				<a class="clearfloat" href=index.php?r=center/detail&id=<?= $v->me_id?>>
					<span class="fl"><?= !empty($v->me_title)?$v->me_title:'';?></span>
					<i class="iconfont icon-arrowright fr you"></i>
				</a>
			</div>
			<? }?>
			
		</div>
	</body>
	<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
	<script type="text/javascript" src="js/jquery.SuperSlide.2.1.js" ></script>
	<script type="text/javascript" src="slick/slick.min.js" ></script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<script type="text/javascript" src="js/tchuang.js" ></script>
	<script type="text/javascript" src="js/hmt.js" ></script>
</html>
