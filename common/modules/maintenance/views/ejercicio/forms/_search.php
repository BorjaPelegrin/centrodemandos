<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\modules\maintenance\searchs\EjercicioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ejercicio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class='col-md-4'> 
            <?= $form->field($model, 'name') ?>
        </div> 
        <div class='col-md-4'> 
            <?= $form->field($model, 'video') ?>
        </div> 
        <div class='col-md-4'> 
            <?= $form->field($model, 'file') ?>
        </div> 
        <div class='col-md-4'> 
            <?= $form->field($model, 'id_zona') ?>
        </div> 
        <div class='col-md-4'> 
            <?php // echo $form->field($model, 'id_tipo') ?>
        </div> 
        <div class='col-md-4'> 
            <?= $form->field($model, 'is_archived')->widget(Select2::classname(), [
                'data' => ["0" => "No", "1" => "Si"],
                'language' => 'es',
                'options' => [
                    'placeholder' => 'Selecciona si está desactivado',
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label("Desactivado?"); ?>
        </div> 
    </div>

    <div class="form-group">
        <div class="pull-right">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
