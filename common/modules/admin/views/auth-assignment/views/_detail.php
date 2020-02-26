<?php

use common\classes\Html;
use yii\widgets\DetailView;

?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'item_name',
        'user_id',
        'created_at',
    ],
]) ?>