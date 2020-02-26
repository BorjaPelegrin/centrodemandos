<?php
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->registerCSS('
    .centered{
        padding-left:32%;
    }
    .tasks-menu .label-danger {
    animation-name: parpadeo;
    animation-duration: 1s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    
    -webkit-animation-name:parpadeo;
    -webkit-animation-duration: 1s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: 2;
    
     font-size: 14px !important;
}

@-moz-keyframes parpadeo{  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@-webkit-keyframes parpadeo {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@keyframes parpadeo {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}
');

// Image 349x65
$urlImage = \yii\helpers\Url::to('@web/img/company.png');
?>

<header class="main-header">
    <!-- Logo -->
    <?= Html::a('<span class="logo-mini"><b>H</b></span><span class="logo-lg">'.
        Html::img($urlImage,['class'=>'user-image','alt'=>'Logo']).'</span>', ['/dashboard/index'], ['class' => 'logo']) ?>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <?php if (!Yii::$app->user->isGuest && Yii::$app->admin->checkPermission('/people/lead/index') && Yii::$app->session->get('user.id_clinic') != 2) : ?>
            <?= $this->render('@common/modules/people/views/leads/views/_notifications') ?>
        <?php endif ?>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php if (!Yii::$app->user->isGuest && Yii::$app->admin->checkPermission('/people/patient/index') && Yii::$app->session->get('user.id_clinic') != 2 && Yii::$app->session->get('user.id_clinic') == 21) : ?>
                    <?= $this->render('@common/modules/people/views/registered-users/views/_notifications') ?>
                <?php endif ?>

                <?php if (!Yii::$app->user->isGuest && Yii::$app->admin->checkPermission('/people/patient/add-comment') && Yii::$app->session->get('user.id_clinic') != 2 && Yii::$app->session->get('user.id_clinic') == 21) : ?>
                    <?= $this->render('../menus/_patient_comments') ?>
                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest && Yii::$app->admin->checkPermission('headerLinks')) : ?>
                    <?= $this->render('@common/views/forms/_select_clinic') ?>
                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest && Yii::$app->admin->checkPermission('phemiumConsultants')) : ?>
                    <?= $this->render('../menus/_consultants_ph') ?>
                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest && Yii::$app->admin->checkPermission('headerLinks')) : ?>
                    <?= $this->render('../menus/_links') ?>
                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest) : ?>
                    <?php // <?= $this->render('../menus/_messages') ?>
                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest && Yii::$app->admin->checkPermission('/communication/notification/index')) : ?>
                    <?= $this->render('../menus/_notifications') ?>
                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest && Yii::$app->admin->checkPermission('/crm/tasks/index')) : ?>
                    <?= $this->render('../menus/_tasks') ?>
                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest && Yii::$app->admin->checkPermission('/crm/tickets/index')) : ?>
                    <?= $this->render('../menus/_tickets') ?>
                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest && Yii::$app->admin->checkPermission('/crm/tickets/index') && Yii::$app->people->clinicSelected()->id_clinic == 2) : ?>
                    <?= $this->render('../menus/_meeting') ?>
                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest && Yii::$app->admin->checkPermission('/clinic/clinic/view')) : ?>
                    <?= $this->render('../menus/_clinic') ?>
                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest && Yii::$app->admin->checkPermission('/treatments/area/select')) : ?>
                    <?= $this->render('../menus/_areas') ?>
                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest) : ?>
                    <?= $this->render('../menus/_account') ?>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
