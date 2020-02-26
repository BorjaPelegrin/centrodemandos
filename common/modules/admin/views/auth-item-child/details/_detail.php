<?php

use common\classes\Html;
use yii\widgets\DetailView;

?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'parent',
        'child',
    ],
]) ?>