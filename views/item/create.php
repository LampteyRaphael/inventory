<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = 'Create Item';
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-create">

<div class="box">
     <div class="box-body">
    <?= $this->render('_upload_excel',['model'=>$model])?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
     </div>
</div>
</div>
