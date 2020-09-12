<?php

use common\classes\Html;

$this->title = 'Rol - ' . ucfirst ($description);
$this->params['breadcrumbs'][] = $this->title;
$options['box-footer'] = 'Listado de permisos por página'
?>

<?= @themes\custom\widgets\AdminlteBox::widget([
    'buttons' => $buttons,
    'content' => $this->render('views/route/_permission-v2', [
        'parent' => $parent,
        'result' => $result,
    ]),
    'options' => [
        'class' => isset($options['class']) ? $options['class'] : 'box-primary',
        'class-header' => 'with-border',
        'box-title' => isset($options['box-title']) ? $options['box-title'] : $this->title,
        'box-footer' => isset($options['box-footer']) ? $options['box-footer'] : '',
    ],
]) ?>
