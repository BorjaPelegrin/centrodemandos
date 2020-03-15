<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use themes\custom\assets\CustomAssets;
use themes\custom\assets\AdminLteAssets;


CustomAssets::register($this);
AdminLteAssets::register($this);
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
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 6000);
    </script>
</head>
<body class="hold-transition skin-pink fixed sidebar-mini sidebar-collapse">
<div class="wrapper">

    <?php if (!Yii::$app->user->isGuest) : ?>
        <?= $this->render('headers/_header') ?>
    <?php endif; ?>
    <?php if (!Yii::$app->user->isGuest) : ?>
        <?= $this->render('sidebars/_sidebar') ?>
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

    <?php if (!Yii::$app->user->isGuest) : ?>
        <?= $this->render('sidebars/_sidebar_control') ?>
    <?php endif; ?>
    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?= $this->render('_modal') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
