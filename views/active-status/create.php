<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActiveStatus */

$this->title = 'Create Active Status';
$this->params['breadcrumbs'][] = ['label' => 'Active Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="active-status-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
