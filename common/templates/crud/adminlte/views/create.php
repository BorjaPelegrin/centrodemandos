<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Añadir nuevo ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$options['class'] = 'box-warning';
$options['box-footer'] = 'Añadir nuevo registro';

?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-create">

<?= "   <?= @themes\custom\widgets\AdminlteBox::widget([
        'buttons' => \$buttons,
        'content' => \$this->render('forms/_form', [
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
