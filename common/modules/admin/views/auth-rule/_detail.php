<?php

use common\classes\Html;
use yii\widgets\DetailView;

?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'name',
        'data:ntext',
        'created_at',
        'updated_at',
    ],
]) ?>