<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Remark */

$this->title = 'Create Remark';
$this->params['breadcrumbs'][] = ['label' => 'Remarks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remark-create">
<div class="box">
     <div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
     </div>
</div>
</div>
