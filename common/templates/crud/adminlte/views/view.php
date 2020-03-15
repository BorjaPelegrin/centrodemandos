<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = 'Viendo registro';
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$options['class'] = 'box-warning';
$options['box-footer'] = 'Viendo registro';

$buttons = [
    Html::a('<i class="fa fa-pencil"></i> Actualizar', ['create'], ['class' => 'btn btn-primary']),
    Html::a('<i class="fa fa-trash"></i> Eliminar', ['delete'], ['class' => 'btn btn-danger']),
];
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">

<?= "   <?= @themes\custom\widgets\AdminlteBox::widget([
        'buttons' => \$buttons,
        'content' => \$this->render('views/_detail', [
            'model' => \$model,
        ]),
        'options' => [
            'class' => isset(\$options['class']) ? \$options['class'] : 'box-warning',
            'class-header' => 'with-border',
            'box-title' => isset(\$options['box-title']) ? \$options['box-title'] : \$this->title,
            'box-footer' => isset(\$options['box-footer']) ? \$options['box-footer'] : '',
        ],
    ]) ?>\n"; ?>

</div>
