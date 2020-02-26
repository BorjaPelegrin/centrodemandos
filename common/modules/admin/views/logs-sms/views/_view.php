<?php

use yii\widgets\DetailView;

?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'area_id',
        'phone',
        'message:ntext',
        'service',
        'result:ntext',
        'created_at',
        'created_user_id',
    ],
]) ?>
