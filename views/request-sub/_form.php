<?php

use app\models\Item;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Remark;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\RequestSub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-sub-form">

    <?php $form = ActiveForm::begin([
         'fieldConfig' => [
            'template' => "{label}\n{input}\n{hint}"
        ]
    ]); ?>
    <div class="">
        <div class="row" id="duplicater">

            <div class="col-md-5">
            <?= $form->field($model, 'item_id[]')->dropdownList(ArrayHelper::map(Item::find()->all(),'id','name'),['options' => [  2=> ['Selected'=>'selected']]])?>
            
            </div>
            <div class="col-md-2">
            <?= $form->field($model, 'quantity[]')->Input('number') ?>
            </div>

            <div class="col-md-2" hidden>
                <?= $form->field($model, 'remark')->dropdownList(ArrayHelper::map(Remark::find()->all(),'id','name'),['options' => [  2=> ['Selected'=>'selected']]])?>
            </div>
            <div class="col-md-1 pt-4">
                <a href="#" class="btn btn-danger" id="remove" style="margin-top:22px;">Remove Item</a>
            </div>
            
            <div class="col-md-4" hidden>
            <?= $form->field($model, 'user_id')->dropdownList(ArrayHelper::map(User::find()->all(),'id','username'),['options' => [  Yii::$app->user->identity->id=> ['Selected'=>'selected']]]) ?>
            </div>

            <div class="col-md-4" hidden>
                <?= $form->field($model, 'quantityIssued')->textInput() ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="#" class="btn btn-primary  btn-block" onclick="duplicate()" style="margin-top:22px;">Add Item</a>
        </div>
        <div class="col-md-6" style="margin-top: 20px;">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block','onclick'=>'return confirm(Are you sure?)']) ?>
        </div>
    </div>








    <?php ActiveForm::end(); ?>

</div>
