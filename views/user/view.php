<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Users';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
<div class="box">
     <div class="box-body">
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
            // 'id',
            'username',
            // 'password',
            'email:email',
            // 'authKey',
            // 'accessToken',
            [
                'attribute'=>'role_id',
                'value'=>$model->role->name??'',
            ],
            [
                'attribute'=>'is_active',
                'value'=>$model->activeStatus->name??'',
            ],
            [
                'attribute'=>'block_id',
                'value'=>$model->blocks->names??'',
            ],
            [
                'attribute'=>'room_id',
                'value'=>$model->room->name??'',
            ],
        ],
    ]) ?>
     </div>
</div>
</div>
