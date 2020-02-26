<?php

use common\classes\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin([
                'id' => 'form-users',
                'layout' => 'horizontal'
            ]); ?>

            <?= $form->errorSummary($model); ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => true]) ?>

            <div class="box-footer" style="text-align: right">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-6">
            <h4>Condiciones:</h4>
            <ul style="font-size: 0.8em;">
                <li>Minimo 8 caracteres</li>
                <li>Maximo 15 caracteres</li>
                <li>Al menos una letra mayúscula </li>
                <li>Al menos una letra minucula</li>
                <li>Al menos un dígito</li>
                <li>Sin espacios en blanco</li>
                <li>Al menos 1 caracter especial</li>
            </ul>
        </div>
    </div>

</div>
