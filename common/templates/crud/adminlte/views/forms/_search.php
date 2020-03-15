<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">

    <?= "<?php " ?>$form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
<?php
$count = 0;
foreach ($generator->getColumnNames() as $attribute) {
    if (++$count === 1) continue;
    echo "        <div class='col-md-4'> \n";
    if($attribute === 'is_archived'){
        echo "            <?= " . $generator->generateActiveSearchField($attribute) . "->widget(Select2::classname(), [
                'data' => [\"0\" => \"No\", \"1\" => \"Si\"],
                'language' => 'es',
                'options' => [
                    'placeholder' => 'Selecciona si está desactivado',
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label(\"Desactivado?\"); ?>\n";
        echo "        </div> \n";
        continue;
    }
    if ($count < 6) {
        echo "            <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n";
    } else {
        echo "            <?php // echo " . $generator->generateActiveSearchField($attribute) . " ?>\n";
    }
    echo "        </div> \n";
}
?>
    </div>

    <div class="form-group">
        <div class="pull-right">
            <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Buscar') ?>, ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
