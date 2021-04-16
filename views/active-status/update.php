<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActiveStatus */

$this->title = 'Update Active Status: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Active Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="active-status-update">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
