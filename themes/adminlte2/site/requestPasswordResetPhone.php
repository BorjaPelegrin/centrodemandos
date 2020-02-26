<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Recuperar contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor indica tu usuario y te enviaremos un código a tu teléfono. Si ya lo tienes introducelo y pulsa "Enviar".</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder' => 'Nombre de usuario'])->label(false) ?>
            <?= $form->field($model, 'code')->textInput(['placeholder' => 'Código'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary pull-right']) ?>
                <div class="btn-group" role="group">
                    <?= Html::a('Volver al acceso', ['site/login'], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Recuperar contraseña', ['site/request-password-reset'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
