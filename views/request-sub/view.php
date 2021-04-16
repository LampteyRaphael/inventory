<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RequestSub */

$this->title = 'Request View';
$this->params['breadcrumbs'][] = ['label' => 'Request Subs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-sub-view">
<div class="box">
   <div class="box-body">
   <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger','data' => ['confirm' => 'Are you sure you want to delete this item?','method' => 'post']])?>
        <?= Html::a('Approve', ['request/approve', 'id' => $model->id], ['class' => 'btn btn-info','data' => ['confirm' => 'Are you sure you want to delete this item?','method' => 'post']])?>
        <?= Html::a('Reject', ['request/rejected', 'id' => $model->id], ['class' => 'btn btn-danger','data' => ['confirm' => 'Are you sure you want to delete this item?','method' => 'post']])?>    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'item_id',
                'value'=>$model->item->name,
            ],
            'quantity',
            [
                'attribute'=>'remark',
                'value'=>$model->remarks->name,
            ],
            'user.username',
            // 'quantityIssued',
            'created_at',
            'updated_at',
        ],
    ]) ?>
   
   </div>
</div>
</div>
