<?php

use yii\bootstrap\Tabs;

?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'items' => [
        [
            'label' => 'Permisos',
            'content' => Yii::$app->view->render('../details/_permissions', [
                'model' => $model,
            ]),
            'active' => true
        ],
    ],
]);
?>