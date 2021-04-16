<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */

$this->title = 'Update Inventory';
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventory-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
