<?php

use common\classes\Html;

$this->title = 'Auth Rules';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    // ['class' => 'yii\grid\SerialColumn'],

    'name',
    'data:ntext',
    'created_at',
    'updated_at',
    [
        'class' => 'yii\grid\ActionColumn',
        'headerOptions' => ['style'=>'width:75px;'],
        'contentOptions' => ['style'=>'text-align:center;width:75px;'],
        'template' => '{view} {update} {delete}',
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
        'visible' => 0 ? false : true
    ],
];

$buttons = [
    Html::a('<i class="fa fa-plus"></i> Añadir', ['create'], ['data-toggle' => 'tooltip', 'title' => 'Añadir', 'class' => 'btn btn-primary']),
    // Html::a('<i class="fa fa-download"></i> Exportar a excel', ['export-allto-excel'], ['class' => 'btn btn-success']),
    // Html::a('<i class="fa fa-upload"></i> Importar desde csv', ['import-allfrom-csv'], ['class' => 'btn btn-primary'])
];
?>

<div class="auth-rule-index">

   <?= @themes\custom\widgets\AdminlteBoxGrid::widget([
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'options' => [
            'class' => 'box-pink',
            'pjax-id' => 'pjax-auth-rules',
            'box-title' => '<i class="fa fa-bars"></i> Listado de auth-rules',
            'rowOptions' => function($model){
                
            }
        ],
        'buttons' => $buttons
    ]) ?>

</div>
