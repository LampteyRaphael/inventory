<?php

use app\models\RequestSub;
use kartik\grid\GridView;
use yii\grid\GridView as GridGridView;
use yii\helpers\Html;

$this->title = 'Request Rejected';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
  <div class="box-body">
  
  <?=
  GridGridView::widget([

    'dataProvider'=>$dataProvider,
    'columns'=>[
        [
            'attribute'=>'item_id',
            'value'=>'item.name',
        ],
        'quantity',
        [
            'attribute'=>'user_id',
            'value'=>'user.username',
        ],
        [
            'attribute'=>'autOfficer',
            'value'=>'officer.username',
        ],
        'created_at'
    ]

  ]);
  ?>
  </div>

</div>
