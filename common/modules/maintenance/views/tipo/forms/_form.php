<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\maintenance\models\Tipo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-tipo'
    ]); ?>

    <div class="row">
        <div class='col-md-4'> 
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="pull-right">
            <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
