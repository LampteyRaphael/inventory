<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */

$this->title = 'Inventory View';
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inventory-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'item_id',
                'value'=>$model->item->name,
            ],
            [
                'attribute'=>'category_id',
                'value'=>$model->category->name,
            ],
            [
                'attribute'=>'brand_id',
                'value'=>$model->brand->name,
            ],
            'serial',
            'model',
            'description',
            [
                'attribute'=>'status',
                'value'=>$model->status0->name,
            ],
            [
                'attribute'=>'block_id',
                'value'=>$model->block->names,
            ],
            [
                'attribute'=>'room_id',
                'value'=>$model->room->name,
            ],
            [
                'attribute'=>'user_id',
                'value'=>$model->user->username,
            ],
            
        ],
    ]) ?>

</div>
