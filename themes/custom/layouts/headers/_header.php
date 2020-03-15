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
    <?= Html::a('<span class="logo-lg">'.
        Html::img($urlImage,['class'=>'user-image','alt'=>'Logo']).'</span>', ['/dashboard/index'], ['class' => 'logo']) ?>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>


        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <?php /*
                <?php if (!Yii::$app->user->isGuest) : ?>
                    <?= $this->render('../menus/_notifications') ?>
                <?php endif; ?>
*/ ?>

                <?php if (!Yii::$app->user->isGuest) : ?>
                    <?= $this->render('../menus/_account') ?>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
