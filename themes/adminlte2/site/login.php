<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
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
/*
$this->registerCss('
    img.heart {
        position:absolute;
        margin-left: 320px;
        margin-top: 50px;
        zoom: 0.1;
        opacity: 0.1;
        z-index: 10000;
      }
    img.heart.sanvalentin {
        transition: 2s;
        zoom: 1;
        opacity: 1;
        margin-top: -150px;
      }
    img.heart {
        position:absolute;
        margin-left: 320px;
        margin-top: 50px;
        zoom: 0.1;
        opacity: 0.1;
        z-index: 10000;
      }
    img.heart.sanvalentin {
        transition: 2s;
        zoom: 1;
        opacity: 1;
        margin-top: -190px;
      }
    img.heart1 {
        position:absolute;
        margin-left: 300px;
        margin-top: 40px;
        zoom: 0.1;
        opacity: 0.1;
        z-index: 10000;
      }
    img.heart1.sanvalentin {
        transition: 1s;
        zoom: 1;
        opacity: 1;
        margin-top: -120px;
      }
    img.heart2 {
        position:absolute;
        margin-left: 360px;
        margin-top: 50px;
        zoom: 0.1;
        opacity: 0.1;
        z-index: 10000;
      }
    img.heart2.sanvalentin {
        transition: 3s;
        zoom: 1;
        opacity: 1;
        margin-top: -160px;
      }
    img.heart3 {
        position:absolute;
        margin-left: 325px;
        margin-top: 60px;
        zoom: 0.1;
        opacity: 0.1;
        z-index: 10000;
      }
    img.heart3.sanvalentin {
        transition: 1s;
        zoom: 1;
        opacity: 1;
        margin-top: -210px;
      }
    img.heart4 {
        position:absolute;
        margin-left: 350px;
        margin-top: 55px;
        zoom: 0.1;
        opacity: 0.1;
        z-index: 10000;
      }
    img.heart4.sanvalentin {
        transition: 1.5s;
        zoom: 1;
        opacity: 1;
        margin-top: -300px;
      }
');

$this->registerJs(<<<JS
     $( document ).ready(function() {
      $('button').click(function(){
        $('.heart').addClass('sanvalentin');
        $('.heart1').addClass('sanvalentin');
        $('.heart2').addClass('sanvalentin');
        $('.heart3').addClass('sanvalentin');
        $('.heart4').addClass('sanvalentin');
        setTimeout(function(){ 
          $('.heart').removeClass('sanvalentin');
        }, 2010);
        setTimeout(function(){ 
          $('.heart1').removeClass('sanvalentin');
        }, 1010);
        setTimeout(function(){ 
          $('.heart2').removeClass('sanvalentin');
        }, 3010);
        setTimeout(function(){ 
          $('.heart3').removeClass('sanvalentin');
        }, 1010);
        setTimeout(function(){ 
          $('.heart4').removeClass('sanvalentin');
        }, 1510);
      });
  });
JS
    , \yii\web\View::POS_LOAD);*/
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
                        <?= Html::a('Registrarme', ['site/register'], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>


        </div>

    </div>

</div>
