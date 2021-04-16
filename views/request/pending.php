<?php

use app\models\RequestSub;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Pending Request';
// $this->params['breadcrumbs'][] = ['label' => 'Pending Request', 'url' => ['site/index']];
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
                    [
                        'attribute'=>'user_id',
                        'value'=>'user.username',
                    ],
            
                    [
                        'attribute'=>'autOfficer',
                        'value'=>'officer.username',
                    ],

                     'created_at',
                  

                ]
            ]);
            ?>
    </div>
</div>