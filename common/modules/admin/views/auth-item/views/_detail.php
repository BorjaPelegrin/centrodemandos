<?php

use common\classes\Html;
use yii\widgets\DetailView;

?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'name',
        //'type',
        'description:ntext',
        //'rule_name',
        //'data:ntext',
        //'created_at',
        //'updated_at',
    ],
]) ?>

<?= $this->render('_related', [
    'model' => $model
]) ?>
