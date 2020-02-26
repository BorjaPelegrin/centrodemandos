<?php

use yii\helpers\Html;
use common\widgets\Collapse;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\admin\searchs\LogsSmsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logs Sms';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    [
        'attribute' => 'area_id',
        'value' => function ($model) {
            $area = \common\modules\core\models\generic\Area::findOne(['id_area'=>$model->area_id]);
            return $area->description;
        },
        'filter' => false, // 'filter' => Html::activeDropDownList($searchModel, 'id_area', \common\modules\treatments\models\Area::getDropDownList(),['class'=>'form-control','prompt' => 'Todas']),
        'headerOptions' => ['style'=>'width:125px;'],
        'contentOptions' => ['style'=>'width:125px;'],
    ],
    'phone',
    [
        'attribute' => 'message',
        'value' => function ($model) {
            return $model->message;
        },
        'headerOptions' => ['style'=>'max-width:400px;'],
        'contentOptions' => ['style'=>'max-width:400px;'],
    ],
    [
        'label' => 'Contador',
        'value' => function ($model) {
            return strlen($model->message);
        }
    ],
    'service',
    [
        'attribute' => 'result',
        'value' => function ($model) {
            return $model->result;
        }
    ],
    //'created_at',
    //'created_user_id',
    [
        'class' => 'yii\grid\ActionColumn',
        'headerOptions' => ['style'=>'width:75px;'],
        'contentOptions' => ['style'=>'text-align:center;width:75px;'],
        'template' => '{view} {add_visit}',
        'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('Ver',['view','id' => $model->id],['class'=>'btn btn-primary btn-xs']);
            },
        ],
    ],
];
?>
<div class="logs-sms-index">

    <?= Collapse::widget([
        'items' => [
            // equivalent to the above
            [
                'label' => 'Búsqueda avanzada',
                'content' => $this->render('forms/_search', [
                    'model' => $searchModel,
                ]),
                // open its content by default
                'contentOptions' => ['class' => '']
            ],
        ]
    ]); ?>

    <?= \themes\adminlte\widgets\AdminlteBoxGrid::widget([
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'buttons' => $buttons,
        'options' => [
            'class' => 'box-pink',
            'pjax-id' => 'pjax-leads',
            'box-title' => '<i class="fa fa-calendar"></i> Listado de solicitudes',
            'rowOptions'=>function($model){
            },
        ]
    ]) ?>
</div>
