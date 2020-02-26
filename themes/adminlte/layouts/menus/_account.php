<?php

use common\classes\Html;
use yii\helpers\Json;
use kartik\dialog\Dialog;

$entity = Yii::$app->user->identity->idUserEntity;
$urlImage = $entity->urlImage;
$route = \Yii::getAlias('@backend/web');
$urlImage = str_replace($route, '', $urlImage);
$clinic = Yii::$app->people->clinicSelected();

// Activa la posibilidad de crear dialogos modales de alerta o confirmación para todas las páginas
echo Dialog::widget([
    'libName' => 'krajeeDialogDefault',
    'options' => [

    ], // default options
]);

//Activar si necesitamos que se verifiquen la configuración de horarios$this->render('_verify_horary');
?>

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Cuenta">
        <?= \yii\helpers\Html::img($urlImage, ['class' => 'user-image', 'alt' => 'User Image']) ?>
        <span class="hidden-xs"><?= $entity ? $entity->fullName : Yii::$app->user->identity->username ?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <?= \yii\helpers\Html::img($urlImage, ['class' => 'img-circle img-profile-image', 'alt' => 'Employee Image', 'style' => 'height: 130px; width:130px;']) ?>
            <p>
                <?= Yii::$app->user->identity->clinicEmployee->employeeName ?>                

                <?php /*<small><?= Yii::$app->user->id .'-'.$clinic->id_clinic.'-'.Yii::$app->user->identity->clinicEmployee->id_employee_type ?></small> */ ?>
            </p>
            <p><small>Último acceso: <?= Yii::$app->formatter->asDateTime(Yii::$app->user->identity->lastLogin) ?></small></p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <?= Html::a($clinic->id_clinic.': '.$clinic->name, ['/clinic/clinic/view', 'id'=>$clinic->id_clinic], ['class'=>'btn btn-primary btn-block btn-flat']) ?>
                </div>
            </div>
            <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <?php
                    if ($entity) {
                        $url = $entity->urlProfile;
                    } else {
                        $url = \yii\helpers\Url::to(['/admin/users/view', 'id'=>Yii::$app->user->id]);
                    }
                ?>
                <?= \yii\helpers\Html::a(
                    'Perfíl',
                    $url,
                    ['class'=>'btn btn-default btn-flat']
                ) ?>
            </div>
            <div class="pull-right">
                <?= \yii\helpers\Html::a(
                    'Salir',
                    ['/site/logout'],
                    [
                        'class'=>'btn btn-default btn-flat',
                        'data' => [
                            'confirm' => 'Deseas salir?',
                            'method' => 'post',
                        ],
                    ]
                ) ?>
            </div>
        </li>
    </ul>
</li>
