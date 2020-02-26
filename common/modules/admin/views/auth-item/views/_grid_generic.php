<?php

use common\classes\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

?>

<?php Pjax::begin([
    'id' => 'pjax-auth-items'
]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'pager' => [
        'prevPageLabel' => '<i class="fa fa-chevron-left"></i>',   // Set the label for the "previous" page button
        'nextPageLabel' => '<i class="fa fa-chevron-right"></i>',   // Set the label for the "next" page button
        'firstPageLabel'=>'<i class="fa fa-step-backward"></i>',   // Set the label for the "first" page button
        'lastPageLabel'=>'<i class="fa fa-step-forward"></i>',    // Set the label for the "last" page button
        'maxButtonCount'=>10,    // Set maximum number of page buttons that can be displayed
    ],
    'options' => [
        'class' => 'grid-view table-responsive'
    ],
    'columns' => [
        'name',
        //'type',
        'description:ntext',
        //'rule_name',
        //'data:ntext',
        // 'created_at',
        // 'updated_at',
        [
            'class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['style'=>'width:75px;'],
            'contentOptions' => ['style'=>'text-align:center;width:75px;'],
            'template' => '{auth-item/view} {auth-item/update}',
            'buttons' => [
                'auth-item/view' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                        'class' => 'btn btn-primary btn-xs',
                        'data-toggle' => 'tooltip',
                        'title' => 'Ver',
                        'data-pjax' => '0'
                    ]);
                },
                'auth-item/update' => function ($url, $model) {
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
    ],
]); ?>

<?php Pjax::end(); ?>