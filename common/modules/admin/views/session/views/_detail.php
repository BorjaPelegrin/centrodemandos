<?php

use common\classes\Html;
use yii\widgets\DetailView;

?>

<div class="row">
    <div class="col-md-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute' => 'expire',
                    'value' => date('Y-m-d H:m:s', $model->expire)
                ],
                //'expire',
                //'data',
                'user_id',
                'last_write',
            ],
        ]) ?>
    </div>
    <div class="col-md-6">
        <?php
            $data = explode('|', $model->data);
            //var_dump($data);
            foreach ($data as $d) {
                echo $d;
                echo '<br>';
            }
        ?>
    </div>
</div>