<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\widgets\bgColor;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Items Table';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="logins-index">
    <?php $this->beginBlock('header');?>
    <h2 class="text-center">Admins Users Table</h2>
    <?php $this->endBlock(); ?>
    <div class="body-content">
        <?php if (Yii::$app->session->hasFlash('message')): ?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Well done!</strong> <?php echo Yii::$app->session->getFlash('message');?> <a href="#" class="alert-link"></a>.
            </div>
        <?php endif; ?>

        <div class="modal fade" id="itemId">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="">
                            <?php $form=ActiveForm::begin()?>
                            <div class="card">
                                <div class="card-body">

                                    <?= $form->field($user, 'username')->textInput(['autofocus' => true]) ?>

                                    <?= $form->field($user,'email')->textInput(['autofocus' => true])?>

                                    <?= $form->field($user,'role_id')->dropDownList(ArrayHelper::map($role,'id','name'),['prompt'=>'Select Option'],['class'=>'form-control','id'=>'role']);?>

                                     <?= $form->field($user,'block_id')->dropDownList(ArrayHelper::map($blocks,'id','names'),['prompt'=>'Select Option']);?>

                                     <?= $form->field($user,'room_id')->dropDownList(ArrayHelper::map($rooms,'id','names'),['prompt'=>'Select Option']);?>

                                    <?= $form->field($user,'password')->passwordInput()?>

                                    <div class="form-group">
                                        <?= Html::a('Go Back',['index',''],['class'=>'btn btn-danger'])?>
                                        <?= Html::submitButton('Create User',['class'=>'btn btn-primary'])?>
                                    </div>
                                </div>
                            </div>
                            <?php ActiveForm::end()?>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#itemId">Add New User</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <?php if( count($users) > 0 ):?>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Names</th>
                                <th>Room</th>
                                <th>Block</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>View/Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($users as $item): ?>
                                <tr class="success">
                                    <td class=""><?= $item->username?? '' ?></td>
                                    <td class=""><?= $item->room->names?? '' ?></td>
                                    <td class=""><?= $item->blocks->names?? '' ?></td>
                                    <td class=""><?= $item->email?? '' ?></td>
                                    <td class="text-success font-weight-bold"><?= $item->role->name?? '' ?></td>
                                    <td class="text-right">
                                        <?= Html::a('View/Edit',['view','id'=>$item->id],['class'=>'btn btn-primary btn-sm'])?>
                                    </td>
                                    <td><?= Html::a('Delete',['delete','id'=>$item->id],['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm("Are you sure you want to delete? Click Ok to continue or Cancel")'])?></td>
                                </tr>
                            <?php endforeach;?>

                            </tbody>

                        </table>
                    <?php else:?>

                        <h2>No Records Found!</h2>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

