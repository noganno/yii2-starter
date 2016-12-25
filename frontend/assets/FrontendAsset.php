<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/bootstrap.min.css',
        'style.css',
        'css/carousel.css',
        'css/owl.theme.css',
        'css/font-awesome.min.css'
    ];

    public $js = [
        'js/jquery.min.js',
        'js/bootstrap.min.js',
        'js/jquery.touchSwipe.min.js',
        'js/carousel.min.js',
        'js/main.js',
        'js/common.js'
    ];

    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'common\assets\Html5shiv',
    ];

	public $jsOptions = array(
		'position' => \yii\web\View::POS_HEAD
	);
}
