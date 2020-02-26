<?php

use common\classes\Html;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\admin\searchs\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permisos';
$this->params['breadcrumbs'][] = $this->title;

$columns = require(__DIR__ . '/../../grids/roles.php');

$buttons = [
    Html::a('<i class="fa fa-plus"></i> Añadir', ['create'], ['class' => 'btn btn-primary']),
];
?>

<div class="auth-items-index">

    <?= @themes\adminlte\widgets\AdminlteBoxGrid::widget([
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'options' => [
            'class' => 'box-pink',
            'pjax-id' => 'pjax-users',
            'box-title' => '<i class="fa fa-bars"></i> Listado de permisos',
            'box-footer' => 'Listado de usuarios',
            'rowOptions' => function($model){

            }
        ],
        'buttons' => $buttons
    ]) ?>

</div>

