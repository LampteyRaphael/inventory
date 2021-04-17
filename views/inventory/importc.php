<?php

use yii\widgets\ActiveForm;
use yii\bootstrap4\Html;

?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Yii::$app->urlManager->createUrl(['inventory/importcc'])]); ?>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'file')->fileInput() ?>
    </div>
    <div class="col-md-1 mt-4">
        <?= Html::submitButton('Save Upload', ['class' => 'btn btn-primary btn-xs']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>