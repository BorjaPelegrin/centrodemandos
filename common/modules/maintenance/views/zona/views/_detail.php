<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id_zona',
        'name',
        'is_archived',
    ],
]) ?>