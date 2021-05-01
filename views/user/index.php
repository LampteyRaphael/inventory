<?php

use app\models\ActiveStatus;
use app\models\Blocks;
use app\models\Role;
use app\models\Room;
use app\models\User;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Block;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'toolbar' =>  [
          ['content'=>
              Html::a('Add User', ['create'], ['class' => 'btn btn-success'])
          ],
          '{export}',
          '{toggleData}'
        ],
        

        'pjax'=>true,
        'bordered' => true,
        'striped' => true,
        'condensed' => false,
        'responsive' => true,
        'bootstrap'=>true,
        'hover' => true,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Users</h3>',
            'type' => GridView::TYPE_PRIMARY,    
        ],

        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

           [
                'attribute'=>'username',
                'value'=> 'username',
                'filter'=>ArrayHelper::map(User::find()->asArray()->all(),'username','username'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => 'Username'],
                    'pluginOptions' => ['allowClear' => true],
                ],
            ],

            [
                'attribute'=>'email',
                'value'=> 'email',
                'filter'=>ArrayHelper::map(User::find()->asArray()->all(),'email','email'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => 'Email'],
                    'pluginOptions' => ['allowClear' => true],
                ],
            ],

            [
                'attribute'=>'role_id',
                'value'=>'role.name',
                'filter'=>ArrayHelper::map(Role::find()->asArray()->all(),'name','name'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => 'Role'],
                    'pluginOptions' => ['allowClear'=> true],
                ],

            ],
            [
                'attribute'=>'is_active',
                'value'=>'activeStatus.name',
                'filter'=>ArrayHelper::map(ActiveStatus::find()->asArray()->all(),'name','name'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => 'Status'],
                    'pluginOptions' => ['allowClear' => true],
                ],
                'contentOptions'=>function($model){
                    return ['style'=>'color:'.($model->is_active==1? 'green':'red')];
                },
            ],
           
            [
                'attribute'=>'block_id',
                'value'=>'blocks.names',
                'filter'=>ArrayHelper::map(Blocks::find()->asArray()->all(),'names','names'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => 'Block'],
                    'pluginOptions' => ['allowClear' => true],
                ],

            ],

            [
                'attribute'=>'room_id',
                'value'=>'room.name',
                'filter'=>ArrayHelper::map(Room::find()->asArray()->all(),'name','name'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => 'Room'],
                    'pluginOptions' => ['allowClear' => true],
                ],

            ],

            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view} {delete} ',
            'width'=>100,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( '<span class="btn btn-success" aria-hidden="true">View</span> ', ['user/view', 'id' => $model->id] );
                },

                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="btn btn-danger" aria-hidden="true">Delete</span>',$url,['data-confirm' => 'Are you sure you want to deny this request?', 'data-method' =>'POST']);
                },
                
            ],
        ],            

        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
