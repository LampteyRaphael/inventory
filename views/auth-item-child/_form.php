<?php

use app\models\AuthAssignment;
use app\models\AuthItem;
use app\models\AuthItemChild;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;;
/* @var $this yii\web\View */
/* @var $model app\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=
    $form->field($model, 'parent')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(AuthAssignment::find()->all(),'item_name','item_name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

   <?=
    $form->field($model, 'child')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(AuthItem::find()->all(),'name','name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
