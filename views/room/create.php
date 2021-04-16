<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Room */

$this->title = 'Create Room';
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-create">
<div class="box">
     <div class="box-body">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_upload_excel',['model'=>$model])?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
     </div>
</div>
</div>
