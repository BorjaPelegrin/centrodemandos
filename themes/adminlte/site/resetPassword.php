<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use common\classes\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Nueva contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">
    <h2><?= Html::encode($this->title) ?></h2>

    <p>Por favor elija nueva contraseña:</p>

    <div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

            <?= $form->field($model, 'password')->passwordInput(['autofocus' => true, 'placeholder'=>'Contraseña'])->label(false) ?>

            <?= $form->field($model, 'repeat_password')->passwordInput(['placeholder'=>'Repetir contraseña'])->label(false) ?>

            <?php // <?= $form->errorSummary($model); ?>

            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-6">
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
