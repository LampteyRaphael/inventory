<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\RequestSub */

$this->title = 'Reset Password';
$this->params['breadcrumbs'][] = ['label' => 'Request', 'url' => ['reset']];
$this->params['breadcrumbs'][] = $this->title;
?>
  <div  class="box">
            <div class="box-body">
 <?= $this->render('../alert/alert')?>
<div class="user-request-reset">

<?php $form=ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Yii::$app->urlManager->createUrl(['user-request/reset'])])?>

<?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'placeholder'=>'Enter new password']) ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
</div>
            </div>
</div>