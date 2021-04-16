<?php

use yii\helpers\Html;
use app\widgets\bgColor;
use app\models\RequestSub;
/* @var $this yii\web\View */
$this->title = 'Dashboard Inventory';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-brands">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Requested</span>
          <?php if(Yii::$app->user->can('admin')):?>
          <span class="info-box-number"><?= RequestSub::find()->count();?></span>
          <?php endif; ?>

            <?php if(Yii::$app->user->can('user')):?>
           <span class="info-box-number"><?= RequestSub::find()->where(['user_id'=>Yii::$app->user->identity->id])->count();?>
           <?php endif ?>
        <small> items</small></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Approved</span>
          <?php if(Yii::$app->user->can('admin')):?>
          <span class="info-box-number"><?= RequestSub::find()->where(['remark'=>1])->count();?></span>
          <?php endif; ?>
          <?php if(Yii::$app->user->can('user')):?>
          <span class="info-box-number"><?= RequestSub::find()->where(['user_id'=>Yii::$app->user->identity->id])->andwhere(['remark'=>1])->count();?></span>
          <?php endif; ?>
          <small> items</small></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pending</span>
          <?php if(Yii::$app->user->can('admin')):?>
          <span class="info-box-number"><?= RequestSub::find()->where(['remark'=>2])->count();?></span>
          <?php endif; ?>
          <?php if(Yii::$app->user->can('user')):?>
          <span class="info-box-number"><?= RequestSub::find()->where(['user_id'=>Yii::$app->user->identity->id])->andwhere(['remark'=>2])->count();?></span>
          <?php endif; ?>
        <small> items</small> </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Rejected</span>
          <?php if(Yii::$app->user->can('admin')):?>
          <span class="info-box-number"><?= RequestSub::find()->where(['user_id'=>Yii::$app->user->identity->id])->andwhere(['remark'=>3])->count();?></span>
          <?php endif; ?>
          <?php if(Yii::$app->user->can('user')):?>
          <span class="info-box-number"><?= RequestSub::find()->where(['remark'=>3])->count();?></span>
          <?php endif; ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Personal Info</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <tbody>
              <tr>
                <th><a href="#">User</a></th>
                <td><?= Yii::$app->user->identity->username??''?></td>
                <td><span class="label label-success"></span></td>
                <td>
                </td>
              </tr>
              <tr>
                <th><a href="#">Email</a></th>
                <td><?= Yii::$app->user->identity->email??''?></td>
              </tr>
              <tr>
                <th><a href="#">Role</a></th>
                <td><?= Yii::$app->user->identity->role->name?></td>
              </tr>
              <tr>
                <th><a href="#">Room</a></th>
                <td><?= Yii::$app->user->identity->room->name??''?></td>
              </tr>
              <tr>
                <td><a href="#">Block</a></td>
                <td><?= Yii::$app->user->identity->blocks->names??''?></td>
              </tr>
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


