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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <![endif]-->
</head>
<body class="hold-transition login-page">

    <div class="login-logo">
        <?= Html::img('@web/img/company.png',['class'=>'user-image','alt'=>'']) ?>
    </div>

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="login-box-body">
            <?php foreach(Yii::$app->session->getAllFlashes() as $key => $message) {
                echo \yii\bootstrap\Alert::widget([
                    'options' => [
                        'class' => 'alert-'.$key,
                    ],
                    'body' =>  $message
                ]);
            } ?>
            <?= $content ?>
        </div>
        <!-- /.login-box-body -->

    </div>
    <!-- /.login-box -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
