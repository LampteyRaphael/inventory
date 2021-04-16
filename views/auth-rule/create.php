<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AuthRule */

$this->title = 'Create Auth Rule';
$this->params['breadcrumbs'][] = ['label' => 'Auth Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-rule-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
