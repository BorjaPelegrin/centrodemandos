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
<body class="hold-transition skin-pink sidebar-mini sidebar-collapse">
<div class="wrapper">

    <?php if (!Yii::$app->user->isGuest) : ?>
        <?= $this->render('headers/_header') ?>
    <?php endif; ?>
    <?php if (!Yii::$app->user->isGuest) : ?>
        <?= $this->render('sidebars/_sidebar') ?>
    <?php endif; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content -->
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
