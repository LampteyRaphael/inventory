<?php

use app\models\AuthItem;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

        <?=
        $form->field($model, 'item_name')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(AuthItem::find()->all(),'name','name'),
            'language' => 'de',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>

    <?=
    $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(User::find()->all(),'id','username'),
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
