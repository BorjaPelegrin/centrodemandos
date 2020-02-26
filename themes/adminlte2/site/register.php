<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registro';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss('
    .login-box-lopd {
        text-align: justify;
        margin-top: 30px;
    }
    .login-box-lopd a {
        color: #ee66be;
    }
');
?>
    <div class="site-login">

        <div class="row">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'sendingform'],
                ]); ?>

                <?= $form->field($model, 'username', [
                    'template' => '
                       <div class="col-sm-">{label}</div>
                       <div class="col-sm-">
                           <div class="input-group col-sm-12 ">
                              <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-user"></span>
                              </span>
                              {input}
                           </div>
                           {error}{hint}
                       </div>'
                ])->textInput([
                    'autofocus' => true,
                    'placeholder' => 'Usuario/Email',

                ])->label('USUARIO') ?>

                <?= $form->field($model, 'password', [
                    'template' => '
                       <div class="col-sm-">{label}</div>
                       <div class="col-sm-">
                           <div class="input-group col-sm-12 ">
                              <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-asterisk"></span>
                              </span>
                              {input}
                           </div>
                           {error}{hint}
                       </div>'
                ])->passwordInput([
                    'placeholder' => 'Contraseña'
                ])->label('CONTRASEÑA') ?>

                <?php // <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('ENTRAR', ['class' => 'btn btn-primary pull-right', 'name' => 'login-button']) ?>
                    <!-- <img class="heart" src="/img/heart.png"/>
                    <img class="heart1" src="/img/heart.png"/>
                    <img class="heart2" src="/img/heart.png"/>
                    <img class="heart3" src="/img/heart.png"/>
                    <img class="heart4" src="/img/heart.png"/> -->
                    <div class="btn-group" role="group">
                        <?= Html::a('Recuperar contraseña', ['site/request-password-reset'], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>

    </div>