<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StatusCategory */

$this->title = 'Update Status Category';
$this->params['breadcrumbs'][] = ['label' => 'Status Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="status-category-update">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
