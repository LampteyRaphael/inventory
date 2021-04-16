<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-user-view">
<?php $this->beginBlock('header');?>
         <h2 class="text-center">Admin Registration</h2>
   <?php $this->endBlock(); ?>
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
    <?php else: ?>
        <div class="row">

<div class="card col-9">
     <div class="card-body">
          <div class="col-10">
                    <?php $form=ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Yii::$app->urlManager->createUrl(['login-user/update'])])?>
                    <input type="hidden" name="ids" value="<?php echo $id;?>">
                    <?= $form->field($user, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($user,'email')->textInput(['autofocus' => true])?>

                    <?= $form->field($user,'role_id')->dropDownList(ArrayHelper::map($role,'id','name'),['prompt'=>'Select Option'],['class'=>'form-control','id'=>'role']);?>

                    <?= $form->field($user,'block_id')->dropDownList(ArrayHelper::map($blocks,'id','names'),['prompt'=>'Select Option']);?>

                    <?= $form->field($user,'room_id')->dropDownList(ArrayHelper::map($rooms,'id','names'),['prompt'=>'Select Option']);?>

                    <?= Html::submitButton('Update',['class'=>'btn btn-primary','onclick'=>'return confirm("Are you sure you want to update? Click Ok to continue or Cancel")'])?>

                <?php ActiveForm::end(); ?>

            </div>
     
     </div>

</div>           
 </div>
    <?php endif; ?>
</div>