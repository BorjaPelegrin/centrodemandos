<?php
$models = $dataProvider->getModels();

$items = [];
foreach ($models as $model) {
    $item = \common\modules\admin\models\AuthItemChild::find()->where(['parent'=>$model->item_name])->all();
    foreach ($item as $it) {
        if (!in_array($it->child, $items))
            array_push($items, $it->child);
    }
}

foreach ($items as $item)
    echo $item.'<br>';



?>