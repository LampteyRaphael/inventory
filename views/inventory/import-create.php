<?php

use kartik\widgets\ActiveForm;
use yii\bootstrap4\Html;
$this->title = 'Import Inventory';
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="box">
  <div class="box-body">
     <?= $this->render('_upload_excel',['model'=>$model])?> 
  </div>
</div>
