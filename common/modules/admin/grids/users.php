<?php
use common\classes\Html;

$buttons = [
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
];

$columns = [
    // ['class' => 'yii\grid\SerialColumn'],

    //'id',
    [
        'attribute' => 'username',
        'format' => 'raw',
        'value' => function ($model) {
            return Html::encode($model->username);
        },
        'headerOptions' => ['style'=>'width:175px;'],
        'contentOptions' => ['style'=>'width:175px;'],
    ],
    //'auth_key',
    //'password_hash',
    //'password_reset_token',
    [
        'attribute' => 'email',
        'format' => 'raw',
        'value' => function ($model) {
            return Html::a($model->email, 'mailto:'.$model->email);
        },
    ],
    [
        'attribute' => 'status',
        'value' => function ($model) {
            return $model->status == 10 ? 'Activo' : 'Inactivo';
        },
        'filter' => [10=>'Activo',0=>'Inactivo'],
        'headerOptions' => ['style'=>'width:75px;'],
        'contentOptions' => ['style'=>'width:75px;'],
    ],
    [
        'attribute' => 'created_at',
        'value' => function ($model) {
            return Yii::$app->formatter->asDatetime(strtotime($model->created_at));
        },
        'filter' => false,
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
    ],
    [
        'attribute' => 'updated_at',
        'value' => function ($model) {
            return Yii::$app->formatter->asDatetime(strtotime($model->updated_at));
        },
        'filter' => false,
        'headerOptions' => ['style'=>'width:85px;'],
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'headerOptions' => ['style'=>'width:100px;'],
        'contentOptions' => ['style'=>'text-align:center;width:100px;'],
        'template' => '{view} {update} {delete}',
        'buttons' => $buttons,
        'visible' => 0 ? false : true
    ],
    [
        'attribute' => 'access_token',
        'value' => function ($model) {
            return $model->access_token;
        },
        'filter' => false,
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
    ],
];

return $columns;
?>