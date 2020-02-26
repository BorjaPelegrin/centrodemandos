<?php
use common\classes\Html;

$status = $model->status ? 'Activo' : 'Desactivado';
$buttonsUser = [
    Html::a('<i class="fa fa-bars"></i> '.$model->fullName, ['/people/employee/view','id'=>$model->idUserEntity->associated_id], [
        'class' => '',
        'data-toggle' => 'tooltip',
        'title' => 'Nombre completo',
    ]),
    Html::a('<i class="fa fa-bars"></i> Listado', ['index'], [
        'class' => '',
        'data-toggle' => 'tooltip',
        'title' => 'Ver el listado',
    ]),
    Html::a('<i class="fa fa-pencil"></i> Actualizar', ['update', 'id'=>$model->id], [
        'class' => '',
        'data-toggle' => 'tooltip',
        'title' => 'Actualizar usuario',
    ]),
    Html::a('<i class="fa fa-key"></i> Cambiar contraseña', ['change-password', 'id'=>$model->id], [
        'class' => '',
        'data-toggle' => 'tooltip',
        'title' => 'Cambiar la contraseña',
    ]),
    //Html::a('<i class="fa fa-trash"></i> Eliminar', ['deleted'], ['class' => 'btn-danger']),
    \yii\helpers\Html::a('<i class="fa fa-send"></i> Email', 'mailto:'.$model->email, [
        'class' => '',
        'data-toggle' => 'tooltip',
        'title' => 'Mandar email',
    ]),
    '<div class="staked" data-toggle="tooltip" title="Estado"><i class="fa fa-bars"></i> Estado <span class="pull-right badge bg-green">'.$status.'</span></div>',
    '<div class="staked" data-toggle="tooltip" title="Fecha dado de alta"><i class="fa fa-bars"></i> Alta <span class="pull-right badge bg-yellow">'.Yii::$app->formatter->asDate($model->created_at).'</span></div>',
    '<div class="staked" data-toggle="tooltip" title="Fecha última actualización"><i class="fa fa-bars"></i> Actualizado <span class="pull-right badge bg-aqua">'.Yii::$app->formatter->asDate($model->updated_at).'</span></div>',
    Html::a('<i class="fa fa-wrench"></i> Token <br>'.$model->access_token, ['token', 'id'=>$model->id], [
        'class' => '',
        'data-toggle' => 'tooltip',
        'title' => 'Gestionar token',
    ]),
    $model->status == '10' ? Html::a('<i class="fa fa-ban"></i> Desactivar', ['deactive', 'id'=>$model->id], [
        'class' => 'bg-danger',
        'data-toggle' => 'tooltip',
        'title' => 'Desactivar usuario',
        'data' => [
            'confirm' => 'Si desactivas este usuario ya no podrá acceder, ¿estás seguro?',
            //'method' => 'post',
        ],
    ]) : '',
    $model->status == 0 ? Html::a('<i class="fa fa-at"></i> Activar', ['active', 'id'=>$model->id], [
        'class' => 'bg-success',
        'data-toggle' => 'tooltip',
        'title' => 'Activar usuario',
        'data' => [
            'confirm' => 'Vas a reactivar el usuario, ¿estás seguro?',
            //'method' => 'post',
        ],
    ]) : '',
];
?>

<?= @themes\adminlte\widgets\AdminlteUser2::widget([
    '_model' => $model,
    'options' => [
        'name' => $model->username,
        'bgColor' => 'bg-yellow',
    ],
    'buttons' => $buttonsUser,
    /*'options' => [
        'class' => isset($options['class']) ? $options['class'] : 'box-primary',
        'class-header' => 'with-border',
        'box-title' => isset($options['box-title']) ? $options['box-title'] : $this->title,
        'box-footer' => isset($options['box-footer']) ? $options['box-footer'] : '',
    ],*/
]) ?>
