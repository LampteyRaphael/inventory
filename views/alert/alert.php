<?php if (Yii::$app->session->hasFlash('message')): ?>
    <div class="alert alert-dismissible alert-success m-auto p-auto">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Well done!</strong> <?php echo Yii::$app->session->getFlash('message');?> <a href="#" class="alert-link"></a>.
    </div>
<?php endif; ?>