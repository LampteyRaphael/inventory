<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StatusCategory */

$this->title = 'Create Status Category';
$this->params['breadcrumbs'][] = ['label' => 'Status Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
