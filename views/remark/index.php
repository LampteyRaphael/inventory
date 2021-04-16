<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RemarkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Remarks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remark-index">
<div class="box">
     <div class="box-body">
    <p>
        <?= Html::a('Create Remark', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
     </div>
</div>
</div>
