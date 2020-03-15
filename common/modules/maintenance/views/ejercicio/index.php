<?php

use yii\helpers\Html;

$this->title = 'Ejercicios';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    'name',
    'video',
    'file',
    [
        'attribute' => 'id_zona',
        'value' => function ($model) {
            return $model->zona->name;
        },
    ],
    [
        'attribute' => 'id_zona',
        'value' => function ($model) {
            return $model->tipo->name;
        },
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'headerOptions' => ['style'=>'width:75px;'],
        'contentOptions' => ['style'=>'text-align:center;width:75px;'],
        'template' => '{view} {update} {select}',
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
            'select' => function ($url, $model) {
                return Html::a($model->is_archived ? '<span class="glyphicon glyphicon-unchecked"></span>' : '<span class="glyphicon glyphicon-check"></span>', $url, [
                    'class' => !$model->is_archived ? 'btn bg-olive btn-xs' : 'btn btn-danger btn-xs',
                    'data-toggle' => 'tooltip',
                    'title' => 'Activar/desactivar',
                    'method' => 'post'
                ]);
            },
        ],
        'visible' => 0 ? false : true
    ],
];

$buttons = [
    Html::a('<i class="fa fa-plus"></i> Añadir', ['create'], ['class' => 'btn btn-primary']),
];
?>

<div class="ejercicio-index">

   <?= \yii\bootstrap\Collapse::widget([
        'items' => [
            [
                'label' => 'Búsqueda avanzada',
                'content' => $this->render('forms/_search', [
                    'model' => $searchModel,
                ]),
                // open its content by default
                'contentOptions' => ['class' => 'in']
            ],
        ]
    ]); ?>


   <?= @themes\custom\widgets\AdminlteBoxGrid::widget([
        //'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'options' => [
            'class' => 'box-warning',
            'box-title' => '<i class="fa fa-bars"></i> Listado de ejercicios',
            'rowOptions' => function($model){
                if($model['is_archived']){
                    return ['class' => 'danger'];
                }
            },
            'no-ajax' => true,
        ],
        'buttons' => $buttons
    ]) ?>

</div>
