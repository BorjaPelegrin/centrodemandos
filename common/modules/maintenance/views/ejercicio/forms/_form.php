<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\maintenance\models\Ejercicio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ejercicio-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-ejercicio'
    ]); ?>

    <div class="row">
        <div class='col-md-4'> 
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4'> 
            <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4'> 
            <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4'> 
            <?= $form->field($model, 'id_zona')->textInput() ?>
        </div>
        <div class='col-md-4'> 
            <?= $form->field($model, 'id_tipo')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <div class="pull-right">
            <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
