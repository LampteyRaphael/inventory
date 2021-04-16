<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request Subs';
?>

<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Requested</span>
              <span class="info-box-number"><?= $request;?><small> items</small></span>
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
              <span class="info-box-number"><?= $approved;?><small> items</small></span>
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
              <span class="info-box-number"><?= $pending;?> <small> items</small> </span>
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
              <span class="info-box-number"><?= $reject;?></span>
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




