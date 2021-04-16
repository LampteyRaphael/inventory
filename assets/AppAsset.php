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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
       'css/site2.css',
        //  'css/sidebar-themes.css',
        //  'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        //  'https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css',
        //  'https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css',
        // 'maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        // // '',
        // 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css',
        // 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css'
        // 'maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        // 'https://use.fontawesome.com/releases/v5.0.6/css/all.css'
       
        
    ];
    public $js = [
      //   'javascript2.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
        
        // 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js',
        // 'https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js',

       // 'cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js',
        // 'maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js',
       // 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
       // 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        
    ];

}
