<?php

use common\classes\Html;
use yii\grid\GridView;

?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'id_area',
            'value' => function ($model) {
                return $model->idArea->description;
            },
        ],
        'alias',
        //'scope',
        //'access_token',
        //'refresh_token',
        [
            'attribute' => 'expires_in',
            'value' => function ($model) {
                return Yii::$app->formatter->asDateTime($model->created + $model->expires_in);
            },
        ],
        [
            'attribute' => 'created',
            'value' => function ($model) {
                return Yii::$app->formatter->asDateTime($model->created);
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{revoke}',
            'buttons' => [
                'revoke' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['/admin/google-client/revoke', 'id' => $model->id_oauth_access_token], [
                        'class' => 'btn btn-xs bg-red',
                        'data-toggle' => 'tooltip',
                        'title' => 'Revocar token',
                        'data' => [
                            'confirm' => 'Estás seguro que quieres revocar este token?',
                            'method' => 'post',
                        ],
                    ]);
                },
            ],
            //'visible' => Yii::$app->admin->checkPermission('/admin/google-client/revoke') ? true : false,
        ],
    ],
]); ?>