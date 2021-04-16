<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */

$this->title = 'Create Inventory';
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-create">
     <?= $this->render('_upload_excel',['model'=>$model])?> 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
