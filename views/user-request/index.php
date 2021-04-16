<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

?>
<div class="user-request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= $this->render('../alert/alert')?>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           
            // [
            //     'attribute'=>'item_id',
            //     'value'=>'item.name'
            // ],
            
            [
                'attribute'=>'id',
                'value'=>function($data){
                    if($data->id){
                        return 'Request Processing';
                    }

                }
            ],
            
            'created_at',
            [
                'attribute'=>'remark',
                'value'=>function($data){

                    if($data->remark==1){

                        return  'Approved';

                    }elseif($data->remark==2){

                        return  'Pending';

                    }elseif($data->remark==3){

                        return 'Rejected';
                    }
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>