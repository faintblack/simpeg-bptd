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
        'css/bootstrap.min.css',
        'css/core.css',
        'css/components.css',
        'css/icons.css',
        'css/pages.css',
        'css/responsive.css',
        'plugins/datatables/jquery.dataTables.min.css',
        'plugins/datatables/buttons.bootstrap.min.css',
        'plugins/datatables/dataTables.bootstrap.min.css',
        'plugins/datatables/fixedHeader.bootstrap.min.css',
        'plugins/morris/morris.css',
        'plugins/bootstrap-sweetalert/sweet-alert.css',

        'css/me.css',
        
    ];
    public $js = [
        'js/modernizr.min.js',
        'js/bootstrap.min.js',
        'js/detect.js',
        'js/fastclick.js',
        'js/jquery.slimscroll.js',
        'js/jquery.blockUI.js',
        'js/waves.js',
        'js/wow.min.js',
        'js/jquery.nicescroll.js',
        'js/jquery.scrollTo.min.js',

        'plugins/datatables/jquery.dataTables.min.js',
        'plugins/datatables/dataTables.bootstrap.js',

        'js/jquery.core.js',
        'js/jquery.app.js',

        'pages/datatables.init.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
