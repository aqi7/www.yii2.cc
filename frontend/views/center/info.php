<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\User */

 $form = ActiveForm::begin([ 'fieldConfig' => [  
            'template' => '<div class="register clearfloat" id="main"><ul>
				<p class="tit fl">{label}</p></ul><div class="col-md-8 controls">{input}{error}</div></div>'  
    ],
    ]); 

    


?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>个人信息</title>
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
    <script type="text/javascript" src="js/menu.js" ></script>
    <link rel="stylesheet" href="css/mui.min1.css">
	<link rel="stylesheet" type="text/css" href="css/app.css" />
	<link rel="stylesheet" type="text/css" href="css/mui.picker.min.css" />
	<link href="css/mui.picker.css" rel="stylesheet" />
	<link href="css/mui.poppicker.css" rel="stylesheet" />
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
			<p class="fl">个人信息</p>
		</div>
		
		<div class="clearfloat" id="main">
			<div class="lease clearfloat">
				<div class="top clearfloat box-s">
					<i class="iconfont icon-gonggao fl"></i>
					<span class="fl box-s">若信息需要修改，请正确修改！</span>
				</div>
				<div class="land-ctent land-ctenttwo clearfloat">
					<ul>
						<li class="box-s clearfloat">
							
							<?= $form->field($model, 'u_name')->textInput(["class"=>"fl",]) ?>
						</li>
						<li class="box-s clearfloat">
							<?= $form->field($model, 'u_tel')->textInput(["class"=>"fl",]) ?>
							
						</li>
                        <li class="box-s clearfloat">
                            <p class="tit fl">地址</p>

                            <input type="text" name="" id="" value="<?php foreach($models as $val ) { echo $val['r_address']; } ?>
								" placeholder="我们如何称呼您" class="fl" />
                        </li>



                    </ul>
				</div>
				<div class="tiaoli">
					<input type="checkbox" name="" id="check" value=""/>
					<label for="check">我已阅读并同意<span>《房嫂租房出租委托协议》</span></label>
				</div>
				
				<?= Html::submitButton('提交', ['class'=>'btn']) ?>
					
			</div>
		</div>
		
		<?php ActiveForm::end() ?>
		<footer class="page-footer fixed-footer" id="footer">
			<ul>
				<li>
					<a href="index.html">
						<i class="iconfont icon-shouyev1"></i>
						<p>网站首页</p>
					</a>
				</li>
				<li class="active">
					<a href="sign.html">
						<i class="iconfont icon-gerenzhongxin"></i>
						<p>个人中心</p>
					</a>
				</li>
				<li>
					<a href="own-details.html">
						<i class="iconfont icon-favorite"></i>
						<p>我的租房</p>
					</a>
				</li>
				
			</ul>
		</footer>
		
		<!--弹窗内容 star-->
	    <div id="loginmodal" class="box-s loginmodaltwo" style="display:none;">	    	
			<form id="loginform" name="loginform" method="post" action="">		
				<div class="center"><input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blutwo hidemodal" value="" tabindex="3"></div>
			</form>
			<div class="bottom clearfloat box-s">
				<div class="login-dui clearfloat">
					<p class="tu">
						<img src="img/dui.png"/>
					</p>
					<p class="tit">
						恭喜您，修改成功！
					</p>
					<p class="fu-tit">
						请保持所填号码手机的通话畅通状态，以便与您取得联系。
					</p>
				</div>
				<input type="button" name="" id="" value="好的，我知道了" class="btn btn1" />
			</div>
		</div>
	    <!--弹窗内容 end-->
	</body>
	<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
	<script type="text/javascript" src="slick/slick.min.js" ></script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<script type="text/javascript" src="js/tchuang.js" ></script>
	<script type="text/javascript" src="js/hmt.js" ></script>
	<script src="js/mui.min.js"></script>
	<script src="js/mui.picker.min.js"></script>
	]<script src="js/mui.picker.js"></script>
	<script src="js/mui.poppicker.js"></script>
	<script src="js/city.data.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/city.data-3.js" type="text/javascript" charset="utf-8"></script>
	<script>
		(function($) {
			$.init();
			var result = $('#result')[0];
			var btns = $('.btnfour');
			btns.each(function(i, btn) {
				btn.addEventListener('tap', function() {
					var optionsJson = this.getAttribute('data-options') || '{}';
					var options = JSON.parse(optionsJson);
					var id = this.getAttribute('id');
					var picker = new $.DtPicker(options);
					picker.show(function(rs) {
						result.innerText = '选择结果: ' + rs.text;
						picker.dispose();
					});
				}, false);
			});
		})(mui);
	</script>
	<script>
		(function($, doc) {
			$.init();
			$.ready(function() {
				var userPicker = new $.PopPicker();
				userPicker.setData([{
					value: '',
					text: '整租'
				}, {
					value: '',
					text: '合租'
				}, {
					value: '',
					text: '短租/日租公寓'
				}, {
					value: '',
					text: '厂房/仓库/土地/车位'
				}, {
					value: '',
					text: '写字楼租售'
				}, {
					value: '',
					text: '商铺出租'
				}]);
				var showUserPickerButton = doc.getElementById('showUserPicker');
				var userResult = doc.getElementById('userResult');
				showUserPickerButton.addEventListener('tap', function(event) {
					userPicker.show(function(items) {
						userResult.innerText = JSON.stringify(items[0]);
					});
				}, false);
			
			
			});
		})(mui, document);
	</script>
</html>
