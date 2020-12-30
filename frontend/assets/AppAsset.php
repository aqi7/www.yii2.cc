<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/all.css',
        'css/app.css',
        'css/base.css',
        'css/loaders.min.css',
        'css/loading.css',
        'css/mui.min.css',
        'css/mui.min1.css',
        'css/mui.picker.min.css',
        'css/mui.picker.css',
        'css/mui.poppicker.css',
        'css/page.css',
        'css/swiper.min.css',

    ];
	    
    public $js = [
        'js/app.js',
        'js/city.data.js',
        'js/city.data-3.js',
        'js/fastclick.js',
        'js/global.js',
        'js/hmt.js',
        'js/jquery.leanModal.min.js',
        'js/jquery.min.js',
        'js/jquery.SuperSlide.2.1.js',
        'js/jquery-1.8.3.min.js',
        'js/menu.js',
        'js/mobiscroll.2.13.2.js',
        'js/mui.min.js',
        'js/mui.picker.js',
        'js/mui.picker.min.js',
        'js/mui.poppicker.js',
        'js/psong.js',
        'js/rem.js',
        'js/swiper.jquery.min.js',
        'js/swiper.min.js',
        'js/tchuang.js',
        'js/yhq.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
