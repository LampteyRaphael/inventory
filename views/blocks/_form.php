<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Blocks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blocks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'names')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
