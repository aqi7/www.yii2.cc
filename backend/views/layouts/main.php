<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Alert;

AppAsset::register($this);
$route = $this->context->id;


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>辰星电子</title>
    <?php $this->head() ?>
	 <script src="https://cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>
</head>

<?php $this->beginBody() ?>

<body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a  style="color:white" class="navbar-brand" href="#">辰星电子维修管理平台</a>
        </div>

	        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav" style="margin-top:1px;border-top:solid 1px white">
             
            <?php
            $session = Yii::$app->session;
            $a_role = $session->get('a_role');
           ?>
           
            <li <?=$route == 'mj-order' ?  ' class="active2" ' : ''?>><a href="<?=  Url::toRoute('mj-order/index'); ?>"><i class="fa fa-file-text-o"></i> 维修单信息</a></li>

			<?php
			if(Yii::$app->session['type']==1){
			?>
            <li <?=$route == 'mj-admin' ?  ' class="active2" ' : ''?>><a href="<?=  Url::toRoute('mj-admin/index'); ?>"><i class="fa fa-user"></i> 员工信息</a></li>
			<?php }?>

			<?php
			if(Yii::$app->session['type']<>4){
			?>
           
            <li <?=$route == 'tongji' ?  ' class="active2" ' : ''?>><a href="<?=  Url::toRoute('tongji/index'); ?>"><i class="fa fa-desktop"></i> 工作量统计</a></li>
			<li <?=$route == 'student' ?  ' class="active2" ' : ''?>><a href="<?=  Url::toRoute('student/index'); ?>"><i class="fa fa-desktop"></i> 学生信息</a></li>
			<li <?=$route == 'room' ?  ' class="active2" ' : ''?>><a href="<?=  Url::toRoute('room/index'); ?>"><i class="fa fa-desktop"></i> 班级信息</a></li>
			<li <?=$route == 'mj-mold' ?  ' class="active2" ' : ''?>><a href="<?=  Url::toRoute('mj-mold/index'); ?>"><i class="fa fa-desktop"></i> 类型信息</a></li>
			<li <?=$route == 'mj-article' ?  ' class="active2" ' : ''?>><a href="<?=  Url::toRoute('mj-article/index'); ?>"><i class="fa fa-desktop"></i> 文章信息</a></li>
			<li <?=$route == 'mj-image'?  ' class="active2" ' : ''?>><a href="<?=  Url::toRoute('mj-image/index'); ?>"><i class="fa fa-desktop"></i> 图片信息</a></li>
			
			<?php }?>
			
       
        </ul>
            </li>
          </ul>
         <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">
            <a href="#" style="color:white" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
			
			<?php
			 if(Yii::$app->session['type']==1){
			  echo "管理员";
			 }else if(Yii::$app->session['type']==2){
                 echo "商务";
			 }else if(Yii::$app->session['type']==3){
                 echo "技术";
			 }else{
			   echo "外部人员";
			 } ?>—
			 <?=Yii::$app->session['ename'];?> </a>
         

            </li>

			  <li class="dropdown user-dropdown">
             <a  style="color:white" href="<?=Url::toRoute('login/editpwd'); ?>"><i class="fa fa-edit"></i> 修改密码</a>

            </li>

            <li class="dropdown user-dropdown">
             <a  style="color:white" href="<?=Url::toRoute('login/exit'); ?>"><i class="fa fa-power-off"></i> 安全退出</a>

            </li>
			       <li class="dropdown user-dropdown" style="width:30px">


            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">
        <?= $content ?>
  </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
<link rel="stylesheet" type="text/css" href="./pantx/css/style.css" />
	<!-- 引用js -->
    <script type="text/javascript" src="./pantx/js/jquery-1.9.1.min.js"></script>
<div  class="box-3" style="display:none;position:fixed;width:310px;height:135px;right:0; bottom:0;">
		<dl id='aaa'>
        	 <dd>任务通知<b id="small_button" class="up"></b></dd>
        	           	<ul>
        	            
							<li><a href="<?=Url::toRoute('mj-order/index')?>" id="kan">您有新的维修订单，客户：<b id='notice_name'> </b>   请尽快去领取任务，并处理</a></li> 
        	            <!--     <li><span>手机号：</span><i>13245678936</i></li>
        	                <li><span>邮&nbsp;&nbsp;&nbsp;箱：</span><i>xu@itrus.com.cn</i></li>
        	                <li><span>办公电话：</span><i>010-2555123</i></li> -->
        	            </ul>            
        </dl>
		</div>
  </body>

</html>
<style type="text/css">
 .box{color: #FFFFFF}
 
  .navbar-inverse .navbar-nav .active {
	background-color: #438EB9;
  }
</style>



<?php $this->endBody() ?>
 
</body>
</html>
<?php $this->endPage() ?>
<?php

if(Yii::$app->session['type']==3){
	
	?>
	
<script type="text/javascript" src="./pantx/js/drag.js"></script>
		<script type="text/javascript">
			//
			$("#kan").click(function(){
				$(".box-3").hide();
				pauseSound();
			});

			$("#small_button").click(function(){
				$(".box-3").hide();
				pauseSound();
			});

			function northsnow()
			{
				 
				 $.get("<?=Url::toRoute('mj-order/getnew')?>",function(result){
					 var jsonStr ="("+result+")";
                     var obj = eval(jsonStr);//; //兼容最好
					  //alert(result);			
					 if(obj.status==1){
					   
					    $(".box-3").show();	
						$("#kan").attr('href',"index.php?r=mj-order/view&id="+obj.w_id);	
						$("#notice_name").html(obj.name);
						playSound();
						// document.getElementById("ddsound").play();
					        	

						//settimeout($(".box-3").hide(""),2000);
					 }
				 });
			}

			var au = document.createElement("audio");
			//au.preload="auto";
			au.src = "./pantx/notice.mp3";
			function playSound() {
				au.play();
			}
			function pauseSound() {
				//au.pause();
			}
	
	
		    northsnow();
			setInterval('northsnow()',1000*60*6); 
	</script>

	<?php }?>
