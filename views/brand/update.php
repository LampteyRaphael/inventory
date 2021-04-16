<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Brand */

$this->title = 'Update Brand: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="brand-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
