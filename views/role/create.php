<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Role */

$this->title = 'Create Role';
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-create">
<div class="box">
     <div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
     </div>
</div>
</div>
