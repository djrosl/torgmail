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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/html';
    public $baseUrl = '@web/html';
    public $css = [
			'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;amp;subset=cyrillic',
	    'styles/main.css',

    ];
    public $js = [
				'scripts/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',

    ];
}
