<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AuthRule */

$this->title = 'Update Auth Rule';
$this->params['breadcrumbs'][] = ['label' => 'Auth Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="auth-rule-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
