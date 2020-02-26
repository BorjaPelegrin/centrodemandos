<?php

use common\classes\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

?>

<?php Pjax::begin([
    'id' => 'pjax-auth-assignments'
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
        [
            'attribute' => 'item_name',
            'format' => 'raw',
            'value' => function($model) {
                return $model->item_name;
            }
        ],
        [
            'attribute' => 'item_name',
            'format' => 'raw',
            'value' => function($model) {
                return $model->idAuthItem ? Html::a($model->idAuthItem->description, ['/admin/rbac/role/view',
                    'id'=>$model->item_name,
                ]) : '';
            }
        ],
        [
            'attribute' => 'created_at',
            'value' => function($model) {
                return Yii::$app->formatter->asDate($model->created_at);
            },
            'headerOptions' => ['style'=>'width:110px;'],
            'contentOptions' => ['style'=>'text-align:right;width:75px;'],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['style'=>'width:75px;'],
            'contentOptions' => ['style'=>'text-align:center;width:75px;'],
            'template' => '{auth-assignment/revoke}',
            'buttons' => [
                'auth-assignment/revoke' => function ($url, $model) use ($idClinicEmployee) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['/admin/auth-assignment/revoke',
                        'id'=>$model->user_id,
                        'items'=>$model->item_name,
                        'idClinicEmployee'=>$idClinicEmployee
                    ], [
                        'class' => 'btn btn-danger btn-xs',
                        'data-toggle' => 'tooltip',
                        'title' => 'Borrar',
                        'data' => [
                            'confirm' => '¿Está seguro?',
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