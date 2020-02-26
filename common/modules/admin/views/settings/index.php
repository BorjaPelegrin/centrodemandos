<?php

use common\classes\Html;
use yii\grid\GridView;
use common\widgets\Collapse;
use yii\widgets\Pjax;
$this->title = 'Configuraciones';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    // ['class' => 'yii\grid\SerialColumn'],

    //'id_setting',
    'description',
    'associated_tb',
    'associated_id',
    'type',
    //'value:ntext',
    // 'created_at',
    // 'updated_at',
    [
        'class' => 'yii\grid\ActionColumn',
        'headerOptions' => ['style'=>'width:75px;'],
        'contentOptions' => ['style'=>'text-align:center;width:75px;'],
        'template' => '{view} {update} {delete} {select}',
        'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                    'class' => 'btn btn-primary btn-xs',
                    'data-toggle' => 'tooltip',
                    'title' => 'Ver',
                    'data-pjax' => '0'
                ]);
            },
            'update' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                    'class' => 'btn btn-info btn-xs',
                    'data-toggle' => 'tooltip',
                    'title' => 'Actualizar',
                    'method' => 'post'
                ]);
            },
            'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                    'class' => 'btn btn-danger btn-xs',
                    'data-toggle' => 'tooltip',
                    'title' => 'Borrar',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]);
            },
        ],
        'visible' => true
    ],
];

$buttons = [
    Html::a('<i class="fa fa-plus"></i> Añadir', ['create'], ['data-toggle' => 'tooltip', 'title' => 'Añadir', 'class' => 'btn btn-primary']),
];
?>
<div class="settings-index">

    <?= \themes\adminlte\widgets\AdminlteBoxGrid::widget([
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'options' => [
            'class' => 'box-pink',
            'pjax-id' => 'pjax-settings',
            'box-title' => '<i class="fa fa-cog"></i> Listado de configuraciones',
            'rowOptions' => function($model){
            }
        ],
        'buttons' => $buttons
    ]) ?>

</div>
