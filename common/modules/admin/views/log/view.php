<?php

use common\classes\Html;
use yii\widgets\DetailView;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\Log */

$this->title = 'Viendo';
$this->params['breadcrumbs'][] = ['label' => 'Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-view">

    <!-- box widget -->
    <div class="box box-pink">
        <div class="box-header">
            <i class="fa fa-bars"></i>
            <h3 class="box-title"></h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <?php // <?= Html::a('Create Lead', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <!-- /. tools -->
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //'id_log',
                            'idUser.username',
                            'type',
                            //'log:ntext',
                            'date_creation',
                        ],
                    ]) ?>
                </div>
                <div class="col-md-6">
                    <strong>Contenido:</strong><br>
                    <?php
                        $log = Json::decode($model->log);
                        foreach ($log as $i => $item) {
                            echo $i .': '.$item;
                            echo '<br>';
                        }
                    ?>
                </div>
            </div>
            <div class="box-footer clearfix">
                Viendo el log
            </div>
        </div>
    </div>

</div>
