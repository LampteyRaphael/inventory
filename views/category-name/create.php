<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryName */

$this->title = 'Create Category Name';
$this->params['breadcrumbs'][] = ['label' => 'Category Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-name-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
