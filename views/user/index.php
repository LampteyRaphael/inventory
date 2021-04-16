<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
<div class="box">
     <div class="box-body">
    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            // 'password',
            'email:email',
          
            [
                'attribute'=>'role_id',
                'value'=>'role.name'

            ],
            [
                'attribute'=>'is_active',
                'value'=>'activeStatus.name'

            ],
           
            [
                'attribute'=>'block_id',
                'value'=>'blocks.names'

            ],

            [
                'attribute'=>'room_id',
                'value'=>'room.name'

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
     </div>
</div>
</div>
