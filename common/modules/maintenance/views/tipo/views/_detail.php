<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id_tipo',
        'name',
        'is_archived',
    ],
]) ?>