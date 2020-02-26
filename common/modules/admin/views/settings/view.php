<?php

use common\classes\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;
use themes\adminlte\widgets\AdminlteBox;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\Settings */

$this->title = 'Viendo';
$this->params['breadcrumbs'][] = ['label' => 'Configuraciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-view">

    <div class="row">


        <div class="col-sm-7 col-md-4 ">
            <?= $this->render('views/_info', [
                'model' => $model,
            ]); ?>
        </div>


        <div class="col-sm-5 col-md-8">
            <!-- box widget -->

            <?= AdminlteBox::widget([
                'buttons' => $buttons,
                'content' => $model->value,
                'options' => [
                    'class' => 'box-warning',
                    'pjax-id' => 'pjax-data',
                    'box-title' => '<i class="fa fa-bars"></i> Listado',
                    /*'rowOptions' => function($model){

                    }*/
                ]
            ]) ?>
        </div>
    </div>

</div>