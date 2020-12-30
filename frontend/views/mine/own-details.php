<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>我的租房信息</title>
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
			<p class="fl">我的租房信息</p>
		</div>		
		<div class="clearfloat" id="main">		
			<div class="service clearfloat">
				<div class="slider one-time">
					<!-- <div>
						<img src="upload/room.jpg"/>
						<div class="tit clearfloat box-s">
							<p class="one">华府骏苑1</p>
							<p class="two">蜀山区-望潜交口</p>
						</div>
					</div> -->
					<?php
	                foreach ($data as $v) {
	                ?>
						<div>
							<img src="../../backend/web/upload/images/<?php echo $v['r_pic']?>"/>
							<div class="tit clearfloat box-s">
								<p class="one"><?php echo $v['build']['bu_name']?></p>
								<p class="two"><?php echo $v['r_address']?></p>
							</div>
						</div>
	                <?php } ?>
				</div>
			</div>		
			
			<div class="service-top clearfloat box-s">
				<?php
	              foreach ($data as $v) {
	            ?>
					<div class="left fl clearfloat box-s">
						<p class="tit titwo"><?php echo $v['build']['bu_name']?>&nbsp;&nbsp;&nbsp;<?php echo $v['r_monery']?><span>元/月</span> <i class="iconfont icon-shoucang"></i>收藏</p>
							<p class="fu-tit"><?php echo $v['rotype']['ro_name']?>   |  <?php echo $v['r_area']?>m²  |  普装  |  <?php echo $v['mothed']['m_name']?></p>
					</div>
				<?php } ?>	

			</div>			
			<div class="service-ctent clearfloat">
				<div class="recom-tit clearfloat box-s">
		    		<p>户型图</p>
		    	</div>
		    	<p class="tit box-s">
		    		<img src="upload/hx1.jpg" class="hx" />
		    	</p>
			</div>
			</div>
			
	</div>
		
	</body>
	<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
	<script type="text/javascript" src="slick/slick.min.js" ></script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<script type="text/javascript" src="js/tchuang.js" ></script>
	<script type="text/javascript" src="js/hmt.js" ></script>
	<script type="text/javascript">
		$('.one-time').slick({
		  dots: true,
		  infinite: false,
		  speed: 300,
		  slidesToShow: 1,
		  touchMove: false,
		  slidesToScroll: 1
		});
	</script>
	<!--分享js-->
	<script type="text/javascript">
		function toshare(){
			$(".am-share").addClass("am-modal-active");	
			if($(".sharebg").length>0){
				$(".sharebg").addClass("sharebg-active");
			}else{
				$("body").append('<div class="sharebg"></div>');
				$(".sharebg").addClass("sharebg-active");
			}
			$(".sharebg-active,.share_btn").click(function(){
				$(".am-share").removeClass("am-modal-active");	
				setTimeout(function(){
					$(".sharebg-active").removeClass("sharebg-active");	
					$(".sharebg").remove();	
				},300);
			})
		}	
	</script>
</html>
