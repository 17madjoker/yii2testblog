<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'public/css/bootstrap.css',
        'public/css/mystyle.css',
        //'public/css/bootstrap.min.css',

    ];
    public $js = [
        //'public/js/bootstrap.js',
        //'public/js/bootstrap.min.js',
    ];
    public $depends = [

    ];
}
