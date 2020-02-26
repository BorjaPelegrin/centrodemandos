<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use common\classes\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
use common\widgets\Collapse;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
<?= "
    <?= Collapse::widget([
        'items' => [
            // equivalent to the above
            [
                'label' => 'Búsqueda avanzada',
                'content' => \$this->render('forms/_search', [
                    'model' => \$searchModel,
                ]),
                // open its content by default
                'contentOptions' => ['class' => '']
            ],
        ]
    ]); ?>"
?>

<?= $generator->enablePjax ? '
    <?php Pjax::begin(); ?>' : '' ?>

<?php echo '
        <!-- box widget -->
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-bars"></i>
                <h3 class="box-title">Listado</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <?php // <?= Html::a(\'Añadir\', [\'create\'], [\'class\' => \'btn btn-success\']) ?>
                </div>
                <!-- /. tools -->
            </div>
            <div class="box-body">'; ?>

<?php if ($generator->indexWidgetType === 'grid'): ?>

<?= "                <?= " ?>GridView::widget([
                    'dataProvider' => $dataProvider,
                    <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n
                    'columns' => [\n" : "'columns' => [\n"; ?>
                        // ['class' => 'yii\grid\SerialColumn'],

<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "                        '" . $name . "',\n";
        } else {
            echo "                        // '" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) {
            echo "                        '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        } else {
            echo "                        // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'headerOptions' => ['style'=>'width:75px;'],
                            'contentOptions' => ['style'=>'text-align:center;width:75px;'],
                            'template' => '{view}',
                            'buttons' => [
                                /*'view' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['/', 'id'=>$model->id], [
                                        'class'=>'',
                                        'data-pjax'=>'0'
                                    ]);
                                },*/
                            ],
                            'visible' => 0 ? false : true
                        ],
                    ],
                ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>
<?php echo '
            </div>  
            <div class="box-footer clearfix">
                Listado de '.Inflector::camel2id(StringHelper::basename($generator->modelClass)).'
            </div>
        </div>
' ?>
<?= $generator->enablePjax ? '
    <?php Pjax::end(); ?>' : '' ?> <?= "\n" ?>

</div>
