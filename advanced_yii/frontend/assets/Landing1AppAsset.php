<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class Landing1AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/landing_new/bootstrap.min.css',
        'css/landing_new/font-awesome.min.css',
        'css/landing_new/animate.css',
        'css/landing_new/overwrite.css',
        'css/landing_new/animate.min.css',
        'css/landing_new/style.css'
    ];
    public $js = [
        'js/landing_new/jquery-2.1.1.min.js',        
        'js/landing_new/bootstrap.min.js',
        'js/landing_new/parallax.min.js',
        'js/landing_new/wow.min.js',
        'js/landing_new/jquery.easing.min.js',
        'js/landing_new/fliplightbox.min.js',
        'js/landing_new/functions.js',
        'js/landing_new/contactform.js'
];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
