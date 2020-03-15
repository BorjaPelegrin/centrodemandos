<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;

?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'items' => [
        /*[
            'label' => 'Contacto',
            'content' => Yii::$app->view->render('_', [
                'model' => $model,
            ]),
            'active' => true
        ],*/
    ],
]);
?>