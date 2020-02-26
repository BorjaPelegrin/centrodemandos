<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use common\classes\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Actualizar {modelClass}: ', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?> . $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model-><?= $generator->getNameAttribute() ?>, 'url' => ['view', <?= $urlParams ?>]];
$this->params['breadcrumbs'][] = <?= $generator->generateString('Update') ?>;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">

    <!-- box widget -->
    <div class="box box-info">
        <div class="box-header">
            <i class="fa fa-bars"></i>
            <h3 class="box-title"><?= "<?= " ?>Html::encode($this->title) ?></h3>
            <!-- tools box -->
            <div class="pull-right box-tools">

            </div>
            <!-- /. tools -->
        </div>
        <div class="box-body">
            <?= "<?= " ?>$this->render('_form', [
            'model' => $model,
            ]) ?>
        </div>
        <div class="box-footer clearfix">
            Actualizando registro
            <?= "<?= " ?>Html::a('Guardar <i class="fa fa-arrow-circle-right"></i>', '#', [
            'onclick' => '$(\'#form-<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>\').yiiActiveForm(\'submitForm\');',
            'class' => 'pull-right btn btn-success'
            ]) ?>
        </div>
    </div>

</div>
