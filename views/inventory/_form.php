<?php

use app\models\Blocks;
use app\models\Brand;
use app\models\Category;
use app\models\Item;
use app\models\Room;
use app\models\StatusCategory;
use app\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="inventory-form"> 

<div class="row">

<div class="col-md-12">

    <div  class="box box-primary">
        <div class="box-body">

             
            <?php $form = ActiveForm::begin(); ?>
          
                <div class="col-md-4">
                <?= 
                $form->field($model, 'item_id')->widget(Select2::classname(), [
                 'data' => ArrayHelper::map(Item::find()->all(),'id','name'),
                 'language' => 'de',
                 'options' => ['placeholder' => 'Select a state ...'],
                 'pluginOptions' => [
                     'allowClear' => true
                 ],
             ]); 
             ?>
                
                </div>
                
                <div class="col-md-4">
                    <?= 
                    $form->field($model, 'category_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Category::find()->all(),'id','name'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Select a state ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); 
                ?>
                </div>

                <div class="col-md-4">
                <?= 
                    $form->field($model, 'brand_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Brand::find()->all(),'id','name'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Select a state ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); 
                ?>
                </div>

                <div class="col-md-4">
                <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                <?= 
                    $form->field($model, 'status')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(StatusCategory::find()->all(),'id','name'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Select a state ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); 
                ?>
                </div>

                <div class="col-md-4" hidden>
                <?= $form->field($model, 'block_id')->dropdownList(ArrayHelper::map(Blocks::find()->all(),'id','names'),['options' => [ Yii::$app->user->identity->block_id => ['Selected'=>'selected']]]) ?>
                </div>

                <div class="col-md-4" hidden>
                <?= $form->field($model, 'room_id')->dropdownList(ArrayHelper::map(Room::find()->all(),'id','name'),['options' => [  Yii::$app->user->identity->room_id => ['Selected'=>'selected']]]) ?>
                </div>

                <div class="col-md-4" hidden>
                <?= $form->field($model, 'user_id')->dropdownList(ArrayHelper::map(User::find()->all(),'id','username'),['options' => [  Yii::$app->user->identity->id=> ['Selected'=>'selected']]]) ?>
                </div>
           

            <div class="row">
                <div class="col-md-12">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success float-right']) ?>
                </div>
            </div>







    <?php ActiveForm::end(); ?>
        </div>
    
    </div>

</div>



</div>

</div>
