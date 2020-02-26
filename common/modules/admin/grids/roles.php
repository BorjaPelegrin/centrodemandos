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
    'permissions' => function ($url, $model) {
        return Html::a('<span class="glyphicon glyphicon-user"></span>', ['/admin/auth-item-roles/roles-v2', 'id' => $model->name], [
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
    [
        'attribute' => 'name',
        'format' => 'raw',
        'value' => function ($model) {
            return Html::encode($model->name);
        },
        'headerOptions' => ['style'=>'width:175px;'],
        'contentOptions' => ['style'=>'width:175px;'],
    ],
    [
        'attribute' => 'description',
        'value' => function ($model) {
            return $model->description;
        },
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
        'attribute' => 'level',
        'value' => function ($model) {
            return $model->level;
        },
        'headerOptions' => ['style'=>'width:75px;'],
        'contentOptions' => ['style'=>'text-align:right;width:75px;'],
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'headerOptions' => ['style'=>'width:100px;'],
        'contentOptions' => ['style'=>'text-align:center;width:100px;'],
        'template' => '{permissions} {update} {delete}',
        'buttons' => $buttons,
        'visible' => 0 ? false : true
    ],
];

return $columns;
?>