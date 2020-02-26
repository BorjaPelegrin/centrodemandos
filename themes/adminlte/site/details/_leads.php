<?php

use common\classes\Html;
?>

<h3>Leads</h3>

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= Yii::$app->people->totalLeads() ?></h3>

                <p>Total Leads</p>
            </div>
            <div class="icon">
                <i class="ion ion-arrow-graph-up-left"></i>
            </div>
            <?= Html::a('Más información <i class="fa fa-arrow-circle-right"></i>', ['/people/lead/',], ['class' => 'small-box-footer']) ?>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= Yii::$app->people->vLeads() ?></h3>

                <p>Vinieron</p>
            </div>
            <div class="icon">
                <i class="ion ion-happy-outline"></i>
            </div>
            <?= Html::a('Más información <i class="fa fa-arrow-circle-right"></i>', ['/people/lead/',], ['class' => 'small-box-footer']) ?>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= Yii::$app->people->nvLeads() ?></h3>

                <p>No vinieron</p>
            </div>
            <div class="icon">
                <i class="ion ion-sad-outline"></i>
            </div>
            <?= Html::a('Más información <i class="fa fa-arrow-circle-right"></i>', ['/people/lead/',], ['class' => 'small-box-footer']) ?>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>Próximamente</h3>

                <p>Leads pendientes</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <?= Html::a('Más información <i class="fa fa-arrow-circle-right"></i>', ['/people/lead/',], ['class' => 'small-box-footer']) ?>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->