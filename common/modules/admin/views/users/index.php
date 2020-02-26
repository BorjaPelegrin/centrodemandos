<?php

use common\classes\Html;
use common\widgets\Collapse;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\admin\searchs\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;

$columns = require(__DIR__ . '/../../grids/users_extra_data.php');

$buttons = [
    Html::a('<i class="fa fa-plus"></i> Añadir', ['create'], ['class' => 'btn btn-primary']),
];
?>

<div class="users-index">

    <?= Collapse::widget([
        'items' => [
            // equivalent to the above
            [
                'label' => 'General',
                'content' => $this->render('forms/_search', [
                    'model' => $searchModel,
                ]),
                // open its content by default
                'contentOptions' => ['class' => 'in']
            ],
        ]
    ]); ?>

   <?= @themes\adminlte\widgets\AdminlteBoxGrid::widget([
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'options' => [
            'class' => 'box-pink',
            'pjax-id' => 'pjax-users',
            'box-title' => '<i class="fa fa-bars"></i> Listado de usuarios',
            'box-footer' => 'Listado de usuarios',
            'rowOptions' => function($model){
                
            }
        ],
        'buttons' => $buttons
    ]) ?>

</div>
