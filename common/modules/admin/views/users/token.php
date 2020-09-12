<?php

use common\classes\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\Users */

$this->title = 'Gestionar token';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';

$options['class'] = 'box-pink';
$options['box-footer'] = 'Token';

$buttons = [
    Html::a('<i class="fa fa-chevron-left"></i> Volver', ['view', 'id'=>$model->id], ['class' => 'btn btn-danger']),
    Html::a('<i class="fa fa-wrench"></i> Generar nuevo token', ['token', 'id'=>$model->id], [
        'class' => 'btn btn-primary',
        'data-toggle' => 'tooltip',
        'title' => 'Gestionar token',
        'data' => [
            'params' => [
                'new' => true
            ],
            'method' => 'post',
        ]
    ])
];
?>
<div class="users-update">

    <?= @themes\custom\widgets\AdminlteBox::widget([
        'buttons' => $buttons,
        'content' => $model->access_token,
        'options' => [
            'class' => isset($options['class']) ? $options['class'] : 'box-primary',
            'class-header' => 'with-border',
            'box-title' => isset($options['box-title']) ? $options['box-title'] : $this->title,
            'box-footer' => isset($options['box-footer']) ? $options['box-footer'] : '',
        ],
    ]) ?>

</div>