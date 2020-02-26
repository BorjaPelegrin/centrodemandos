<?php

use common\classes\Html;

/*$entity = Yii::$app->user->identity->idUserEntity;
$urlImage = $entity->urlImage;
$route = \Yii::getAlias('@backend/web');
$urlImage = str_replace($route, '', $urlImage);*/
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php /*
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Buscar...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        */ ?>
        <?php if (!Yii::$app->user->isGuest) : ?>
            <?= $this->render('_sidebar_menu') ?>
        <?php endif; ?>
    </section>
</aside>
