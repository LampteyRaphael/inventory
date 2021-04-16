<?php

use app\models\Item;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\RequestSub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-request-create">
<div class="col-md-12">
                <a href="#" class="btn btn-primary" onclick="duplicate()" style="margin-top:22px;">Add Item</a>
            </div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="">
        <div class="row" id="duplicater">

            <div class="col-md-5">
            <?= $form->field($model, 'item_id[]')->dropDownList(ArrayHelper::map(Item::find()->all(),'id','name'),['prompt'=>'Choose Option']) ?>
            </div>
            <div class="col-md-2">
            <?= $form->field($model, 'quantity[]')->Input('number') ?>
            </div>

            <div class="col-md-2" hidden>
                <?= $form->field($model, 'remark')->dropdownList([1=>'Approved',2=>'Pending',3=>'Rejected'],['options' => [2=> ['Selected'=>'selected']]]) ?>
            </div>
            <div class="col-md-1">
                <a href="#" class="btn btn-danger" id="remove" style="margin-top:22px;">Remove Item</a>
            </div>
            
            <div class="col-md-2" hidden>
            <?= $form->field($model, 'user_id')->dropdownList(ArrayHelper::map(User::find()->all(),'id','username'),['options' => [  Yii::$app->user->identity->id=> ['Selected'=>'selected']]]) ?>
            </div>

            <div class="col-md-4" hidden>
                <?= $form->field($model, 'quantityIssued')->textInput() ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg float-right']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
