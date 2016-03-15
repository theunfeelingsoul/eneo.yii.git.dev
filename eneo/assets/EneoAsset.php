<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class EneoAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/custom.css',
        // 'css/font-awesome/css/font-awesome.min.css',
    ];
    public $js = [
        // 'https://maps.googleapis.com/maps/api/js',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyAjMBVn_GZdUo1xzvfQwcggnBrXN8bcMas',
        'js/custom-js.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
