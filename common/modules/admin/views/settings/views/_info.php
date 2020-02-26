<?php
use yii\helpers\Html;
use themes\adminlte\widgets\AdminlteUser2;
use common\modules\treatments\models\Area;
use common\modules\clinic\models\Clinic;

/* @var $model common\modules\admin\models\Settings */

$buttons = [];

$buttonsUser = [
    $bgColor =>
    '<div class="staked" data-toggle="tooltip" title="Asociado a"><i class="fa fa-bars"></i> Asociado a <span class="pull-right">' . $model->associated_tb . '</span></div>',
    '<div class="staked" data-toggle="tooltip" title="Id asociado"><i class="fa fa-bars"></i> Id asociado <span class="pull-right">' . $model->associated_id . '</span></div>',
    '<div class="staked" data-toggle="tooltip" title="Tipo"><i class="fa fa-bars"></i> Tipo <span class="pull-right">' . $model->type . '</span></div>',
    '<div class="staked" data-toggle="tooltip" title="Fecha creado '.Yii::$app->formatter->asDate($model->created_at).'"><i class="fa fa-bars"></i> Creado <span class="pull-right badge bg-yellow">'.Yii::$app->formatter->asDate($model->created_at).'</span></div>',
    '<div class="staked" data-toggle="tooltip" title="Fecha última actualización '.Yii::$app->formatter->asDate($model->updated_at).'"><i class="fa fa-bars"></i> Actualizado <span class="pull-right badge bg-aqua">'.Yii::$app->formatter->asDate($model->updated_at).'</span></div>',
];

?>

<?= AdminlteUser2::widget([
    'options' => [
        'name' => $model->description,
        //'description' => $model->description,
        'id' => $model->id_setting,
        //'img' => 'ruta img',
        'bgColor' => $bgColor,
        'buttons' => [
            Html::a('<i class="glyphicon glyphicon-pencil"></i> Actualizar', ['update', 'id' => $model->id_setting], ['style'=>'color:#000', 'data-toggle' => 'tooltip', 'title' => 'Actualizar configuración', 'data-pjax'=>0]),
            Html::a('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['delete', 'id' => $model->id_setting], ['style'=>'color:#000', 'data-toggle' => 'tooltip', 'title' => 'Borrar configuración', 'data-pjax'=>0]),
        ],
    ],
    'buttons' => $buttonsUser,
]) ?>