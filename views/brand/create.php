<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Brand */

$this->title = 'Create Brand';
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-create">

    <?= $this->render('_upload_excel',['model'=>$model])?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
