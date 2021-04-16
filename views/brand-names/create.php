<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BrandNames */

$this->title = 'Create Brand Names';
$this->params['breadcrumbs'][] = ['label' => 'Brand Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-names-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
