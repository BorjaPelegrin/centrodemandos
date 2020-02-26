<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use common\classes\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = 'Viendo';
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">

    <div class="row">
        <div class="col-md-3">
            <?= "<?= " ?>Html::a(<?= $generator->generateString('Actualizar') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
            <?= "<?= " ?>Html::a(<?= $generator->generateString('Eliminar') ?>, ['delete', <?= $urlParams ?>], [
                'class' => 'btn btn-danger pull-right',
                'data' => [
                    'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
                    'method' => 'post',
                ],
            ]) ?>
            <?= "<?= " ?>DetailView::widget([
                'model' => $model,
                'attributes' => [
                    <?php
                        if (($tableSchema = $generator->getTableSchema()) === false) {
                            foreach ($generator->getColumnNames() as $name) {
                                echo "'" . $name . "',\n";
                            }
                        } else {
                            foreach ($generator->getTableSchema()->columns as $column) {
                                $format = $generator->generateColumnFormat($column);
                                echo "'" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                            }
                        }
                    ?>
                ],
            ]) ?>
        </div>
        <div class="col-md-9">
            <!-- box widget -->
            <div class="box box-warning">
                <div class="box-header">
                    <i class="fa fa-navicon"></i>
                    <h3 class="box-title">Información relacionada</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">

                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <?= "<?= " ?>Tabs::widget([
                        'navType' => 'nav-pills',
                        'items' => [
                            /*[
                                'label' => 'Contacto',
                                'content' => Yii::$app->view->render('details/_', [
                                    'model' => $model,
                                ]),
                                'active' => true
                            ],*/
                        ],
                    ]);
                    ?>
                </div>
                <div class="box-footer clearfix">
                    Información relacionada
                </div>
            </div>
        </div>
    </div>

</div>
