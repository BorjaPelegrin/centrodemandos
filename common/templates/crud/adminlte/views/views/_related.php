<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\bootstrap\Tabs;

?>

<?= "<?= " ?>Tabs::widget([
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