<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Remark */

$this->title = 'Update Remark';
$this->params['breadcrumbs'][] = ['label' => 'Remarks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="remark-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
