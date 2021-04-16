<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blocks */

$this->title = 'Update Blocks';
$this->params['breadcrumbs'][] = ['label' => 'Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blocks-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
