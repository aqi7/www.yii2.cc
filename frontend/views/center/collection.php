<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>我的收藏</title>
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
			<p class="fl">我的收藏</p>
		</div>
		
		<div class="clearfloat" id="main">
			<div class="recom clearfloat collection">
		    	<div class="content clearfloat box-s">
		    	<?php foreach($models as $v) {?>
		    		<div class="list clearfloat fl box-s">
		    			<a href="index.php?r=index/hdetails&r_id=<?php echo $v['r_id']?>">
			    			<div class="tu clearfloat">
			    				<span></span>
			    				<img src="../../backend/web/upload/images/<?php echo $v['r_pic']?>"/>
			    			</div>
			    			<div class="right clearfloat">
			    				<div class="tit clearfloat">
			    					<p class="fl"><?php echo $v['build']['bu_name']?></p>
			    					<a href='' id='as'><i class="fr iconfont icon-delete delete"> <input type="hidden" id="collect" value="<?php echo $v['r_id'];?>" /></i></a>
			    				</div>
			    				<p class="recom-jianjie"><?php echo $v['rotype']['ro_name']?>   |  <?php echo $v['r_area']?>  |  <?php echo $v['mothed']['m_name']?></p>
			    				<div class="recom-bottom clearfloat">
			    					<?php echo $v['r_monery']?><samp>元/月</samp>
			    				</div>
			    			</div>
		    			</a>
		    		</div>

		    		<?php } ?>
		    	</div>
		    </div>
		</div>
	</body>
	<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
	<script src="js/fastclick.js"></script>
	<script src="js/mui.min.js"></script>
	<script type="text/javascript" src="js/hmt.js" ></script>
	<script type="text/javascript">
                $(function () {
                    $("#as").click(function () {
                       $.get("<?=Url::toRoute('index/sc')?>",{id:$("#collect").val()},function(data){
                            
                        })
                    });
                })

            </script>
</html>
