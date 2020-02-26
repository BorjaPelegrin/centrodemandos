<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\classes\Html;
use yii\widgets\Breadcrumbs;
use rmenor\adminlte2\assets\AssetBundle;
use rmenor\adminlte2\assets\PluginsBundle;
use themes\adminlte\assets\CustomAssets;
use backend\assets\AppAsset;

AssetBundle::register($this);
PluginsBundle::register($this);
CustomAssets::register($this);
AppAsset::register($this);

$this->registerMetaTag(['name' => 'robots', 'content' => 'noindex']);
$this->registerMetaTag(['charset' => Yii::$app->charset]);
$this->registerMetaTag(['http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Hal Admin Panel']);
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no']);
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <?php $this->head() ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js" data-pace-options='{ "restartOnRequestAfter": false }'></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.js" data-pace-options='{ "restartOnRequestAfter": false }'></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/red/pace-theme-minimal.css" rel="stylesheet" />

        <style>
            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            .pace-inactive {
                display: none;
            }

            .pace .pace-progress {
                background: #dd0f10;
                position: fixed;
                z-index: 2000;
                top: 0;
                right: 100%;
                width: 100%;
                height: 2px;
            }

            .pace .pace-progress-inner {
                display: block;
                position: absolute;
                right: 0px;
                width: 100px;
                height: 100%;
                box-shadow: 0 0 10px #dd0f10, 0 0 5px #dd0f10;
                opacity: 1.0;
                -webkit-transform: rotate(3deg) translate(0px, -4px);
                -moz-transform: rotate(3deg) translate(0px, -4px);
                -ms-transform: rotate(3deg) translate(0px, -4px);
                -o-transform: rotate(3deg) translate(0px, -4px);
                transform: rotate(3deg) translate(0px, -4px);
            }

            .pace .pace-activity {
                display: block;
                position: fixed;
                z-index: 2000;
                top: 15px;
                right: 15px;
                width: 14px;
                height: 14px;
                border: solid 2px transparent;
                border-top-color: #dd0f10;
                border-left-color: #dd0f10;
                border-radius: 10px;
                -webkit-animation: pace-spinner 400ms linear infinite;
                -moz-animation: pace-spinner 400ms linear infinite;
                -ms-animation: pace-spinner 400ms linear infinite;
                -o-animation: pace-spinner 400ms linear infinite;
                animation: pace-spinner 400ms linear infinite;
            }

            @-webkit-keyframes pace-spinner {
                0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
            }
            @-moz-keyframes pace-spinner {
                0% { -moz-transform: rotate(0deg); transform: rotate(0deg); }
                100% { -moz-transform: rotate(360deg); transform: rotate(360deg); }
            }
            @-o-keyframes pace-spinner {
                0% { -o-transform: rotate(0deg); transform: rotate(0deg); }
                100% { -o-transform: rotate(360deg); transform: rotate(360deg); }
            }
            @-ms-keyframes pace-spinner {
                0% { -ms-transform: rotate(0deg); transform: rotate(0deg); }
                100% { -ms-transform: rotate(360deg); transform: rotate(360deg); }
            }
            @keyframes pace-spinner {
                0% { transform: rotate(0deg); transform: rotate(0deg); }
                100% { transform: rotate(360deg); transform: rotate(360deg); }
            }
        </style>

        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 6000);
        </script>
    </head>
    <body class="hold-transition skin-pink sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <?php if (!Yii::$app->user->isGuest) : ?>
            <?= $this->render('headers/_header') ?>
        <?php endif; ?>
        <?php if (!Yii::$app->user->isGuest) : ?>
            <?= $this->render('sidebars/_sidebar') ?>
        <?php endif; ?>

        <?php if (!Yii::$app->user->isGuest) : ?>
            <?= $this->render('sidebars/_sidebar_control') ?>
        <?php endif; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?php if ($this->title !== null) {
                        echo $this->title;
                        echo isset($this->description) && !is_null($this->description) ? '<small></small>' : '';
                    } else {
                        echo \yii\helpers\Inflector::camel2words(\yii\helpers\Inflector::id2camel($this->context->module->id));
                        echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                    } ?>
                </h1>

                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]); ?>
            </section>
            <!-- /.content-header -->
            <!-- Content -->
            <div class="content">
                <?php foreach(Yii::$app->session->getAllFlashes() as $key => $message) {
                    echo \yii2mod\notify\BootstrapNotify::widget();
                    /*echo Alert::widget([
                        'options' => [
                            'class' => 'alert-'.$key,
                        ],
                        'body' =>  $message
                    ]);*/
                } ?>
                <?= $content ?>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?= $this->render('footers/_footer') ?>
    </div>
    <!-- ./wrapper -->

    <?= $this->render('_modal') ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>