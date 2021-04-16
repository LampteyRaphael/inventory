<?php

use app\models\Item;
use app\models\Remark;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-sub-index">
    <?= $this->render('../alert/alert')?>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'toolbar' =>  [
            ['content'=>
                Html::a('Create Request', ['create'], ['class' => 'btn btn-success'])
            ],
            '{export}',
            '{toggleData}'
        ],

    'pjax'=>true,
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
    'bootstrap'=>true,
    'responsive' => true,
    'hover' => true,
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Request</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            ['class' => 'kartik\grid\CheckBoxColumn'],
            [
                'attribute'=>'user_id',
                'value'=>'user.username',
                'filter'=>ArrayHelper::map(User::find()->asArray()->all(),'username','username'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'User'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],

            [
                'attribute'=>'item_id',
                'value'=> 'item.name',
                'filter' => ArrayHelper::map(Item::find()->asArray()->all(), 'name', 'name'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => 'Item'],
                    'pluginOptions' => ['allowClear' => true],
                ],
            ],
            'quantity',
            [
                'attribute'=>'remark',
                'value'=> function($model){
                    if($model->remark===1){
                        return  'Approved';
                    }elseif($model->remark===2){
                        return "Pending";
                    }elseif($model->remark===3){
                        return "Rejected";
                    }

                },
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' => 'color:'.($model->remark === 1 ? 'green' : 'red')];
                },
                'filter' => ArrayHelper::map(Remark::find()->asArray()->all(), 'name', 'name'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => 'Remark'],
                    'pluginOptions' => ['allowClear' => true],
                ],
            ],

            [
                'attribute'=>'autOfficer',
                'value'=>'officer.username',
                'filter'=>ArrayHelper::map(User::find()->asArray()->all(),'username','username'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'auth user'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],
            // 'quantityIssued',

            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view} {delete} ',
            'width'=>100,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( '<span class="btn btn-success" aria-hidden="true">View</span> ', ['request-sub/view', 'id' => $model->id] );
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
