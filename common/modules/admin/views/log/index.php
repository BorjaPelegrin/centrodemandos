<?php

use common\classes\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\admin\searchs\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    [
        'attribute' => 'id_user',
        'value' => function ($model) {
            return $model->idUser ? $model->idUser->username : '';
        },
        'filter' => false,
        'headerOptions' => ['style'=>'width:95px;'],
        'contentOptions' => ['style'=>'width:95px;'],
    ],
    [
        //'attribute' => 'id_user',
        'label' => 'Empleado',
        'value' => function ($model) {
            return $model->idEmployee ? $model->idEmployee->fullName : 'No disponible';
        },
        'headerOptions' => ['style'=>'width:125px;'],
        'contentOptions' => ['style'=>'width:125px;'],
    ],
    [
        'attribute' => 'type',
        'value' => function ($model) {
            return $model->type;
        },
        'headerOptions' => ['style'=>'width:95px;'],
        'contentOptions' => ['style'=>'width:95px;'],
    ],
    [
        'attribute' => 'log',
        'format' => 'raw',
        'value' => function ($model) {
            $log = \yii\helpers\Json::decode($model->log);
            $val = '';
            if (is_array($item)) {
                foreach ($item as $n => $it) {
                    $val .= 'param:'. $n . ': ' . $it . '<br>';
                }
            } else {
                $val .= $i . ': ' . $item . '<br>';
            }
            return $val;
        },
        'filter' => false,
        'headerOptions' => ['style'=>'max-width:225px;'],
        'contentOptions' => ['style'=>'max-width:225px;'],
    ],
    [
        'attribute' => 'date_creation',
        'value' => function ($model) {
            return \Yii::$app->formatter->asDatetime($model->date_creation);
        },
        'filter' => false,
        'headerOptions' => ['style'=>'width:95px;'],
        'contentOptions' => ['style'=>'width:95px;'],
    ],

    [
        'class' => 'yii\grid\ActionColumn',
        'headerOptions' => ['style'=>'width:75px;'],
        'contentOptions' => ['style'=>'text-align:center;width:75px;'],
        'template' => '{view}',
        'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                    'class'=>'btn btn-primary btn-xs',
                    'data-toggle' => 'tooltip',
                    'title' => 'Ver',
                    'data-pjax'=>'0'
                ]);
            },
        ],
        // Todo: añadir condición si es necesario
        'visible' => true
    ],
];
?>
<div class="log-index">

    <?= @themes\custom\widgets\AdminlteBoxGrid::widget([
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'options' => [
            'class' => 'box-pink',
            'pjax-id' => 'pjax-knowledge-types',
            'box-title' => '<i class="fa fa-bars"></i> Listado de logs',
            'rowOptions' => function($model){

            }
        ],
        'buttons' => $buttons
    ]) ?>

</div>
