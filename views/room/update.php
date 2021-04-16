<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Room */

$this->title = 'Update Room: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="room-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
