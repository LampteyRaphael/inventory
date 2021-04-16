<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;

use yii\bootstrap4\Breadcrumbs;

use common\widgets\Alert;
use yii\bootstrap4\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
      
</head>
<body>
<?php $this->beginBody() ?>
<div class="page-wrapper default-theme sidebar-bg bg3 toggled">

<!-- <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a> -->
  <?php if(Yii::$app->user->isGuest):?>
    <?php else:?>
  
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content mCustomScrollbar _mCS_1 mCS-autoHide desktop mCS_no_scrollbar"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position: relative; top: 0px; left: 0px;" dir="ltr">
                <!-- sidebar-brand  -->
                <!-- <div class="sidebar-item sidebar-brand">
                  
                    <a href="#">pro sidebar</a>
                </div> -->
                <div class="sidebar-brand">
        <a href="#">Inventory System</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
                <!-- sidebar-header  -->
                <div class="sidebar-item sidebar-header d-flex flex-nowrap">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded mCS_img_loaded" src="../image/r.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong><?= Yii::$app->user->identity->username??''?></strong>
                        </span>
                        <span class="user-role"><?= Yii::$app->user->identity->role->name??''?></span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-item sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-menu  -->
                <div class="sidebar-item sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-tachometer-alt"></i>
                                <span class="menu-text">Dashboard</span>
                                <span class="badge badge-pill badge-warning">New</span>
                            </a>
                            <div class="sidebar-submenu" style="display: none;">
                                <ul>
                                <?php if(Yii::$app->user->can('admin')):?>
                                    <li>
                                        <a href="#">Dashboard 2</a>
                                    </li>
                                    <?php elseif(Yii::$app->user->can('user')):?>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/user-request/dash')?>">Dashboard</a>
                                    </li>
                                    <?php endif?>
                                </ul>
                            </div>
                        </li>

                        <?php if(Yii::$app->user->can('admin')):?>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="menu-text">Admins</span>
                                <span class="badge badge-pill badge-danger">3</span>
                            </a>
                            <div class="sidebar-submenu" style="display: none;">
                                <ul>
                                <li>
                                        <a href="<?php   echo \yii\helpers\Url::toRoute('/user/index')?>">Admins
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('user/create')?>">Add New Admins
                                        <span><i class="fa fa-plus"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/role/index')?>">Roles</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/role/create')?>">Add New Role</a>
                                    </li>
                                   
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/auth-assignment')?>">Auth Assignment</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/auth-item-child/index')?>">Auth Child</a>
                                    </li>
                                 
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/auth-item/index/')?>">Auth Items</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/auth-rule/index')?>">Auth Rule</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span class="menu-text">Inventory</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/inventory/index')?>">Inventory</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/inventory/create')?>">Add New Inventory</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/status-category/index')?>">Status Category</a>
                                    </li>
                                    <li>
                                      <a href="<?= yii\helpers\Url::toRoute('/status-category/create')?>">Add New Status Category</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span class="menu-text">Request</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/request/index')?>">Request</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/request/create')?>">Reqested</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/request-sub/index')?>">Sub Requested</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/request-sub/create')?>">Sub Reqested</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span class="menu-text">Rooms</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                       <a href="<?= yii\helpers\Url::toRoute('/room/index')?>">Rooms</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/room/create')?>">Add New Room</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span class="menu-text">Brands</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                       <a href="<?= yii\helpers\Url::toRoute('/brand/index')?>">Brand</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/room/create')?>">Add New Brand</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span class="menu-text">Items</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/item/index')?>">Item Name</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/item/create')?>">Add New Item</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span class="menu-text">Block</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/blocks/index')?>">Block</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/blocks/create')?>">Add New Blocks</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span class="menu-text">Categories</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/category/index')?>">Item Category</a>
                                    </li>
                                    <li>
                                        <a href="<?= yii\helpers\Url::toRoute('/category/create')?>">Add New Item Category</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php elseif(Yii::$app->user->can('user')):?>
                        <li>
                            <a href="<?= yii\helpers\Url::toRoute('/user-request/reset')?>">
                                <i class="fa fa-key"></i>
                                <span class="menu-text">Reset Password</span>
                                <span class="badge badge-pill badge-primary">R</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= yii\helpers\Url::toRoute('/user-request/create')?>">
                                <i class="fa fa-book"></i>
                                <span class="menu-text">Make Request</span>
                                <span class="badge badge-pill badge-primary">R</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= yii\helpers\Url::toRoute('/user-request/pending')?>">
                                <i class="fa fa-cog"></i>
                                <span class="menu-text">Request Pending</span>
                                <span class="badge badge-pill badge-primary">P</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= yii\helpers\Url::toRoute('/user-request/approved')?>">
                                <i class="fa fa-book"></i>
                                <span class="menu-text">Request Approved</span>
                                <span class="badge badge-pill badge-primary">A</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= yii\helpers\Url::toRoute('/user-request/rejected')?>">
                                <i class="fa fa-exclamation-circle"></i>
                                <span class="menu-text">Request Rejected</span>
                                <span class="badge badge-pill badge-primary">R</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span class="menu-text">Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span class="menu-text">Examples</span>
                            </a>
                        </li> -->
                        <?php else:?>
                        
                        <?php endif;?>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; height: 0px; top: 0px; display: block; max-height: 747px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
            <!-- sidebar-footer  -->
           
        </nav>
        <?php endif;?>

        <?php if(Yii::$app->user->isGuest):?>
    <?php else:?>
   
        <!-- page-content  -->
        <main class="page-content pt-2">
        <header class="admin-header">

        <a id="toggle-sidebar" class="btn btn-sm btn-default" style="padding-left: 20px" href="#">
            <i class="fas fa-bars"></i>
        </a>

        <nav class=" ml-auto">
            <ul class="nav align-items-center">

                <li class="nav-item">
                    <div class="dropdown">

                        <a href="#" class="nav-link text-center" data-toggle="dropdown">

                            <i class="mdi mdi-24px mdi-account-group"></i>
                            <span class="d-flex" style="margin-top: -10px;"><?= Yii::$app->user->identity->username??''?></span>
                        </a>

                        <div class="dropdown-menu notification-container dropdown-menu-right">
                            <div class="d-flex p-all-15 bg-white justify-content-center border-bottom ">
                                <span class="h5 m-0">Binary Side</span>
                            </div>
                            <div class="notification-events bg-gray-300">
                                <div class="text-overline m-b-5">selected</div>
                                <a href="#" class="d-block m-b-10">
                                    <div class="card">
                                        <div class="card-body"> <i class="mdi mdi-circle text-success"></i>     Side of Binary:  Auto</div>
                                    </div>
                                </a>

                                <hr>
                                <div class="text-overline m-b-5">other options</div>
                                <a href="https://petronpay.com/office/network/user/side_default/1" class="d-block m-b-10">
                                    <div class="card">
                                        <div class="card-body">
                                            Side of Binary:  Left
                                        </div>
                                    </div>
                                </a>
                                <a href="https://petronpay.com/office/network/user/side_default/2" class="d-block m-b-10">
                                    <div class="card">
                                        <div class="card-body">
                                            Side of Binary:  Right
                                        </div>
                                    </div>
                                </a>


                            </div>

                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <span class="avatar-title rounded-circle bg-dark1"></span>

                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-78px, 61px, 0px);">
                        <a class="dropdown-item" href="https://petronpay.com/office/account"> My Account</a>
                        <div class="dropdown-divider"></div>
                        <?php echo Html::beginForm(['/site/logout'], 'post'). Html::submitButton('Logout',['class' => 'dropdown-item']).Html::endForm() ?>
                    </div>
                </li>
            </ul>

        </nav>
    </header>
    <?php endif;?>

    <?php if(Yii::$app->user->isGuest):?>
    <?php else:?>
<div class="container-fluid bg-dark">
</div>
<div class="container-fluid">
<section class="pull-up">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12 mx-auto  mt-2">
                <div class="card py-3 m-b-30">
                    <div class="card-body">
                    <div id="overlay" class="overlay"></div>
            <div class="container-fluid p-5">
                <div class="row">
                <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
                </div>
                <?php endif;?>
            <div class="row">
            <div class="table-responsive">
            <?= $this->render('../alert/alert')?>
              <?= $content?>
              </div>
            </div>
              <?php if(Yii::$app->user->isGuest):?>
    <?php else:?>
</div>
</div>
</div>
</div>
</div>
</section>
</div>           
</main>
<?php endif;?>
<!-- page-content" -->
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
