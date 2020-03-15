<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id_ejercicio',
        'name',
        'video',
        'file',
        'id_zona',
        'id_tipo',
        'is_archived',
    ],
]) ?>