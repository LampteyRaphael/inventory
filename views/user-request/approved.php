
<?php

use app\models\RequestSub;
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'Request Approved';
// $this->params['breadcrumbs'][] = ['label' => 'Pending Request', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
   <div class="box-body">
   
   <?=
      GridView::widget([
        'dataProvider'=>$dataProvider,
        // 'filterModel' => $searchModel,
        'columns'=>[
            [
                'attribute'=>'item_id',
                'value'=>'item.name'
            ],
            'quantity',
            
            'updated_at',
        ]
      ]);
   ?>
   
   </div>
</div>