
<?php

use app\models\Item;
use app\models\RequestSub;
use app\models\User;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'Request Approved';
// $this->params['breadcrumbs'][] = ['label' => 'Pending Request', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
  <?=
      GridView::widget([

        'dataProvider'=>$dataProvider,
        'toolbar' =>  [
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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Approved Items</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns'=>[
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
                'attribute'=>'user_id',
                'value'=> 'user.username',
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' => 'color:'.($model->user->username ? 'green' : 'red')];
                },
                'filter'=>ArrayHelper::map(User::find()->asArray()->all(),'username','username'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => 'User'],
                    'pluginOptions' => ['allowClear' => true],
                ],
            ],
            [
                'attribute'=>'autOfficer',
                'value'=> 'officer.username',
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' => 'color:'.($model->officer->username? 'green' : 'red')];
                },
                'filter'=>ArrayHelper::map(User::find()->asArray()->all(),'username','username'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => 'User'],
                    'pluginOptions' => ['allowClear' => true],
                ],
            ],
            
            'updated_at'
        ]

      ]);
  ?>
