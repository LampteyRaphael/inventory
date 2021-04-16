<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BlocksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blocks-index">

    <p>
        <?= Html::a('Create Blocks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= $this->render('../alert/alert')?>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'names',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
