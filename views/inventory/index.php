<?php

use app\models\Blocks;
use app\models\Brand;
use app\models\Category;
use app\models\Item;
use app\models\Room;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InventorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-index">
    <?= $this->render('../alert/alert')?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'showPageSummary'=>true,
        // 'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        // 'containerOptions' => ['style'=>'overflow: auto'],
        // 'beforeHeader'=>[
        //     [
        //         'columns'=>[
        //             ['content'=>'Header Before 1', 'options'=>['colspan'=>4, 'class'=>'text-center warning']], 
        //             ['content'=>'Header Before 2', 'options'=>['colspan'=>4, 'class'=>'text-center warning']], 
        //             ['content'=>'Header Before 3', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
        //         ],
        //          'options'=>['class'=>'skip-export'] // remove this row from export
        //     ]
        // ],

        'toolbar' =>  [
            ['content'=>
                Html::a('Create Inventory', ['create'], ['class' => 'btn btn-success'])
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
    // 'floatHeader' => false,
    // 'showPageSummary' => true,
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Inventory</h3>',
        'type' => GridView::TYPE_PRIMARY,
        // 'footer'=>true

    ],

    // 'panel' => [
    //     'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Countries</h3>',
    //     'type'=>'success',
    //     'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
    //     'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
    //     'footer'=>false
    // ],

        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            //  ['class' => 'kartik\grid\ActionColumn'],

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
            [
                'attribute'=>'category_id',
                'value'=> 'category.name',
                 'filter'=>ArrayHelper::map(Category::find()->asArray()->all(),'name','name'),
                 'filterType'=>GridView::FILTER_SELECT2,
                 'filterWidgetOptions'=>[
                     'options'=>['prompt'=>'Category'],
                     'pluginOptions'=>['allowClear'=>true],
                 ],
            ],
            [
                'attribute'=>'brand_id',
                'value'=> 'brand.name',
                'filter'=>ArrayHelper::map(Brand::find()->asArray()->all(),'name','name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Brand'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],

            [
                'attribute'=>'serial',
                'value'=> 'serial',
            ],

            // 'model',
            // 'description',

            [
                'attribute'=>'status',
                'value'=> 'status0.name'
            ],

            [
                'attribute'=>'block_id',
                'value'=> 'block.names',
                'filter'=>ArrayHelper::map(Blocks::find()->asArray()->all(),'names','names'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Block'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],

            [
                'attribute'=>'room_id',
                'value'=> 'room.name',
                'filter'=>ArrayHelper::map(Room::find()->asArray()->all(),'name','name'),
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'options'=>['prompt'=>'Room'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
            ],

            [
                'attribute'=>'user_id',
                'value'=> 'user.username',
                'filter'=>ArrayHelper::map(User::find()->asArray()->all(),'username','username'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => 'User'],
                    'pluginOptions' => ['allowClear' => true],
                ],
            ],
            //  ['class' => 'kartik\grid\ActionColumn'],
             ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view} {delete} ',
            'width'=>100,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( '<span class="btn btn-success" aria-hidden="true">View</span> ', ['inventory/view', 'id' => $model->id] );
                },

                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="btn btn-danger" aria-hidden="true">Delete</span>',$url,['data-confirm' => 'Are you sure you want to deny this request?', 'data-method' =>'POST']);
                },
                
            ],

        ],

        ],
    ]); ?>

    <?php Pjax::end(); ?>
            <!-- </div>
        </div>
    </div> -->
</div>




<?php


 
// Create a panel layout for your GridView widget
// echo GridView::widget([
//     'dataProvider'=> $dataProvider,
//     'filterModel' => $searchModel,
//     'columns' => $gridColumns,
//     'toolbar' => [
//         [
//             'content'=>
//                 Html::button('<i class="glyphicon glyphicon-plus"></i>', [
//                     'type'=>'button', 
//                     'title'=>Yii::t('kvgrid', 'Add Book'), 
//                     'class'=>'btn btn-success'
//                 ]) . ' '.
//                 Html::a('<i class="fas fa-redo"></i>', ['grid-demo'], [
//                     'class' => 'btn btn-secondary', 
//                     'title' => Yii::t('kvgrid', 'Reset Grid')
//                 ]),
//         ],
//         '{export}',
//         '{toggleData}'
//     ]
// ]);



?>




</div>
