<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/sb-admin.css',
		'font-awesome/css/font-awesome.min.css',
        'css/morris-0.4.3.min.css',
        // 'layui/css/layui.css',
        'layui/css/modules/laydate/default/laydate.css'
    ];
    public $js = [
		 'js/bootstrap.js',
		 'js/raphael-min.js',
         'js/tablesorter/jquery.tablesorter.js',
		 'js/tablesorter/tables.js',
         'js/bootstrap.js' ,
         'layui/layui.js',
         'layui/lay/modules/laydate.js'
    ];
 

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
