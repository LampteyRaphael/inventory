<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RequestSub */

$this->title = 'Update Request';
$this->params['breadcrumbs'][] = ['label' => 'Request Subs', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="request-sub-update">
<div class="box">
   <div class="box-body">
   <?= Html::a('Approve', ['request/approve', 'id' => $model->id], ['class' => 'btn btn-info','data' => ['confirm' => 'Are you sure, you want to approve this item?','method' => 'post']])?>
   <?= Html::a('Reject', ['request/rejected', 'id' => $model->id], ['class' => 'btn btn-danger','data' => ['confirm' => 'Are you sure you want to delete this item?','method' => 'post']])?>    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
      
   </div>
</div>
</div>
