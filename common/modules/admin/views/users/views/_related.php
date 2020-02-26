<?php

use common\classes\Html;
use yii\bootstrap\Tabs;

?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'items' => [
	    /*[
            'label' => 'Configuración',
            'content' => Yii::$app->view->render('../details/_related_item', [
                'model' => $model,
                'entity' => $entity
            ]),
            'active' => false
        ],*/
        /*[
            'label' => 'Roles',
            'content' => Yii::$app->view->render('../details/_roles', [
                'model' => $model,
            ]),
            'active' => true
        ],*/
        /*[
            'label' => 'Permisos',
            'content' => Yii::$app->view->render('../details/_related_item', [
                'model' => $model,
            ]),
            'active' => false
        ],*/
    ],
]);
?>
