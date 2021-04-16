
<?php
use yii\bootstrap4\Html;
?>
<h1>Pending-Request</h1>
    <div class="table-responsive">
    <?= Html::a('Back',['approved'])?>

<?php
if( count($view) > 0 ):?>

<table class="table table-hover">
    <thead>
    <tr>
        <th>Item</th>
        <th>Qty</th>
        <th>Processing</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($view as $item): ?>
        <tr>
            <td><?= $item->item0->name ?></td>
            <td><?= $item->quantity ?></td>
            <td>
                <i class="fa fa-cog fa-spin" style="font-size:24px"></i>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<?php else:?>
<h2>No Records Found!</h2>
<?php endif; ?>
</div>