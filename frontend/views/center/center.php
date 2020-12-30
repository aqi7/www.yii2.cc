<?php

use yii\web\Session;

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>个人中心</title>
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
<div class="center-header center-headers clearfloat" id="header">

    <div class="banner"><img src="upload/2.jpg" /></div>
    <div class="top fl clearfloat box-s">
        <p class="tit fl">欢迎，<?= Yii::$app->session['u_name']; ?></p>
    </div>
</div>

<div class="clearfloat pcenter" id="main">

    <div class="p-list p-listwo clearfloat box-s">
        <a href="index.php?r=center/collection" class="clearfloat">
            <i class="iconfont icon-favorite fl xing"></i>
            <span class="fl">我的收藏</span>
            <i class="iconfont icon-arrowright fr you"></i>
        </a>
    </div>
    <div class="p-list p-listhree clearfloat box-s">
        <a href="index.php?r=center/info" class="clearfloat">
            <i class="iconfont icon-caifu fl ben"></i>
            <span class="fl">个人信息</span>
            <i class="iconfont icon-arrowright fr you"></i>
        </a>
    </div>
    <div class="p-list p-listwo clearfloat box-s">
        <a href=index.php?r=center/account&id=<?= Yii::$app->session['u_id']; ?> class="clearfloat">
            <i class="iconfont icon-money fl money"></i>
            <span class="fl">我的账单</span>
            <i class="iconfont icon-arrowright fr you"></i>
        </a>
    </div>
    <div class="p-list p-listhree clearfloat box-s">
        <a href="index.php?r=center/receipt" class="clearfloat">
            <i class="iconfont icon-weituoguanli fl weituoguanli"></i>
            <span class="fl">我的收据</span>
            <i class="iconfont icon-arrowright fr you"></i>
        </a>
    </div>
    <div class="p-list p-listhree clearfloat box-s">
        <a href="index.php?r=center/contract" class="clearfloat">
            <i class="iconfont icon-hetongguanli fl hetongguanli"></i>
            <span class="fl">我的合同</span>
            <i class="iconfont icon-arrowright fr you"></i>
        </a>
    </div>


    <div class="p-list p-listwo clearfloat box-s">
        <a href="index.php?r=center/message&uid=<?= Yii::$app->session['u_id']; ?>" class="clearfloat">
            <i class="iconfont icon-gonggao fl gonggao"></i>
            <span class="fl">我的消息</span>
            <i class="iconfont icon-arrowright fr you"></i>
        </a>
    </div>

    <div class="p-list p-listhree clearfloat box-s">
        <a href="index.php?r=center/lose" class="clearfloat">
            <i class="iconfont icon-lock fl lock"></i>
            <span class="fl">修改密码</span>
            <i class="iconfont icon-arrowright fr you"></i>
        </a>
    </div>
</div>

<footer class="page-footer fixed-footer" id="footer">
    <ul>
        <li>
            <a href="index.php?r=index/index">
                <i class="iconfont icon-shouyev1"></i>
                <p>网站首页</p>
            </a>
        </li>
        <li class="active">
            <?php
            $session = Yii::$app->session;
            $u_id = $session->get('u_id');
            if(empty($u_id)) {   ?>
            <a href="index.php?r=login/index">
                <?php    }
                else{   ?>
                <a href="index.php?r=center/index">
                    <?php  } ?>
                    <i class="iconfont icon-gerenzhongxin"></i>
                    <p>个人中心</p>
                </a>
        </li>
        <li>
            <?php
            $session = Yii::$app->session;
            $u_id = $session->get('u_id');
            if(empty($u_id)) {   ?>
            <a href="index.php?r=login/index">
                <?php    }
                else{   ?>
                <a href="index.php?r=mine/index">
                    <?php  } ?>
                    <i class="iconfont icon-favorite"></i>
                    <p>我的租房</p>
                </a>
        </li>
    </ul>
</footer>
</body>
<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="slick/slick.min.js" ></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<script type="text/javascript" src="js/tchuang.js" ></script>
<script type="text/javascript" src="js/hmt.js" ></script>
</html>
