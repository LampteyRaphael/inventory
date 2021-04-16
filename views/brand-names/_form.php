<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BrandNames */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brand-names-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brandCategories')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
