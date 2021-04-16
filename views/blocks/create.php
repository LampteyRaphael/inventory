<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blocks */

$this->title = 'Create Blocks';
$this->params['breadcrumbs'][] = ['label' => 'Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blocks-create">

    <?= $this->render('_upload_excel',['model'=>$model])?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
