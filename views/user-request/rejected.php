<?php

use yii\grid\GridView;

$this->title = 'Request Rejected';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
   <div class="box-body">
   
   <?=
      GridView::widget([
        'dataProvider'=>$dataProvider,
        'columns'=>[
           
            [
                'attribute'=>'item_id',
                'value'=>'item.name'
            ],
            'quantity',

            'created_at',
        ]
      ]);
   ?>
   
   </div>
</div>