<?php

use common\classes\Html;

$this->title = 'Sesiones';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    // ['class' => 'yii\grid\SerialColumn'],

    'id',
    /*[
        'attribute' => 'data',
        'headerOptions' => ['style'=>'max-width:75px;'],
        'contentOptions' => ['style'=>'max-width:75px;'],
    ],*/
    [
        'attribute' => 'user_id',
        'value' => function ($model) {
            return $model->idUser->username;
        },
        'headerOptions' => ['style'=>'width:175px;'],
        'contentOptions' => ['style'=>'width:175px;'],
    ],
    [
        'attribute' => 'last_write',
        'value' => function ($model) {
            return Yii::$app->formatter->asDatetime($model->last_write);
        },
        'headerOptions' => ['style'=>'width:75px;'],
        'contentOptions' => ['style'=>'text-align:right;width:75px;'],
    ],
    [
        'attribute' => 'expire',
        'value' => function ($model) {
            return Yii::$app->formatter->asDatetime($model->expire);
        },
        'headerOptions' => ['style'=>'width:75px;'],
        'contentOptions' => ['style'=>'width:75px;'],
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'headerOptions' => ['style'=>'width:95px;'],
        'contentOptions' => ['style'=>'text-align:center;width:95px;'],
        'template' => '{view} {cancel} {delete}',
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
            'cancel' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-remove"></span>', ['/admin/session/cancel', 'id'=>$model->id], [
                    'class' => 'btn btn-warning btn-xs',
                    'data-toggle' => 'tooltip',
                    'title' => 'Cerrar sesión',
                    'data-pjax' => '0'
                ]);
            },
        ],
        'visible' => 0 ? false : true
    ],
];
?>

<div class="session-index">

    <?= @themes\adminlte\widgets\AdminlteBoxGrid::widget([
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'options' => [
            'class' => 'box-pink',
            'pjax-id' => 'pjax-sessions',
            'box-title' => '<i class="fa fa-bars"></i> Listado de sesiones',
            'rowOptions' => function($model){

            },
            'box-footer' => '<div class="pull-right">Actualizado a las: '.Yii::$app->formatter->asTime(time()). '</div>'
        ],
    ]) ?>

</div>
