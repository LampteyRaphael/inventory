<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RequestSub */

$this->title = 'Request';
$this->params['breadcrumbs'][] = ['label' => 'Request Subs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="request-sub-create">
<div class="box">
     <div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
     </div>
</div>
</div>
