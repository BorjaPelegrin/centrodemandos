<?php
use common\classes\Html;

$buttonsUser = [
    Html::a('<i class="fa fa-bars"></i> Listado', ['index'], ['class' => '']),
    Html::a('<i class="fa fa-pencil"></i> Actualizar', ['update', 'id'=>$model->name], ['class' => '']),
    //Html::a('<i class="fa fa-trash"></i> Eliminar', ['deleted'], ['class' => 'btn-danger']),
    '<div class="staked"><i class="fa fa-bars"></i> '.$model->name.'</div>',
];
?>

<?= @themes\adminlte\widgets\AdminlteBox::widget([
    'buttons' => $buttons,
    'content' => $model->name,
    'options' => [
        'class' => isset($options['class']) ? $options['class'] : 'box-primary',
        'class-header' => 'with-border',
        'box-title' => 'Permiso',
    ],
]) ?>