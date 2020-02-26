<?php
use yii\bootstrap\ActiveForm;
?>

<p class="login-box-msg">Iniciar sesión</p>

<?php $form = ActiveForm::begin(['id' => 'sign_in']); ?>

    <div class="form-group has-feedback">
        <?= $form->field($model, 'username')->textInput(['placeholder'=>'Usuario','autofocus' => true])->label(false) ?>
    </div>
    <div class="form-group has-feedback">
        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Contraseña'])->label(false) ?>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                    <input type="checkbox"> Recordarme
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
    </div>

<?php ActiveForm::end(); ?>

<?php /*
<div class="social-auth-links text-center">
    <p>- OR -</p>
    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
</div>
<!-- /.social-auth-links -->
 */ ?>

<a href="#">I forgot my password</a><br>
<a href="register.html" class="text-center">Register a new membership</a>

