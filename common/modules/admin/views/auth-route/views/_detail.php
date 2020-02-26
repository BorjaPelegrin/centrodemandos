<?php

use common\classes\Html;
use yii\widgets\DetailView;

use common\modules\admin\models\AuthItem;
use common\modules\admin\models\AuthItemChild;

?>
<div class="row">
    <div class="col-md-4">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                //'type',
                'description:ntext',
                //'rule_name',
                //'data:ntext',
                'created_at',
                'updated_at',
            ],
        ]) ?>
    </div>
    <div class="col-md-4">
        <?php
            $aiChilds = AuthItemChild::find()->where(['child'=>$model->name])->all();
            foreach ($aiChilds as $item) {
                echo Html::a($item->parent, ['/admin/auth-item-roles/view-info-ajax', 'id'=>$item->parent], [
                    'title' => '',
                    'class' => 'showModal',
                ]);
                echo '<br>';
            }
        ?>
    </div>
    <div class="col-md-4">
    </div>
</div>


