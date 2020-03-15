<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Actualizar {modelClass}: ', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?> . $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model-><?= $generator->getNameAttribute() ?>, 'url' => ['view', <?= $urlParams ?>]];
$this->params['breadcrumbs'][] = <?= $generator->generateString('Actualizar') ?>;

$options['class'] = 'box-warning';
$options['box-footer'] = 'Actualizar registro';

?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">

<?= "   <?= @themes\custom\widgets\AdminlteBox::widget([
        'buttons' => \$buttons,
        'content' => \$this->render('forms/_form', [
            'model' => \$model,
        ]),
        'options' => [
            'class' => isset(\$options['class']) ? \$options['class'] : 'box-primary',
            'class-header' => 'with-border',
            'box-title' => isset(\$options['box-title']) ? \$options['box-title'] : \$this->title,
            'box-footer' => isset(\$options['box-footer']) ? \$options['box-footer'] : '',
        ],
    ]) ?>\n"; ?>

</div>

