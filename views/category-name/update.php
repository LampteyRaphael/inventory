<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryName */

$this->title = 'Update Category Name';
$this->params['breadcrumbs'][] = ['label' => 'Category Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-name-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
