<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;

/*if ($exception->statusCode == 404) {
    $this->registerJs('
        setTimeout(function(){
            window.location.replace("/");
        }, 5000)
    ');
}*/
?>
<div class="site-error">

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Se ha producido el error anterior en la ruta  <strong><?= Yii::$app->request->getAbsoluteUrl() ?></strong>, mientras el servidor procesaba su solicitud.
    </p>
    <p>
        Por favor, póngase en contacto con nosotros si piensa que esto es un error del servidor. Gracias
    </p>
    <?php if ($exception->statusCode == 404) : ?>
        <p>Esta página se redirigirá de forma automática.</p>
    <?php endif ?>

    <?= Html::a('<i class="fa fa-reply"></i> Volver', Yii::$app->request->referrer, ['class' => 'btn btn-primary']) ?>

</div>
