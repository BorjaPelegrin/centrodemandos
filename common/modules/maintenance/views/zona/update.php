<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\maintenance\models\Zona */

$this->title = 'Actualizar Zona: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Zonas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_zona]];
$this->params['breadcrumbs'][] = 'Actualizar';

$options['class'] = 'box-warning';
$options['box-footer'] = 'Actualizar registro';

?>
<div class="zona-update">

   <?= @themes\custom\widgets\AdminlteBox::widget([
        'buttons' => $buttons,
        'content' => $this->render('forms/_form', [
            'model' => $model,
        ]),
        'options' => [
            'class' => isset($options['class']) ? $options['class'] : 'box-primary',
            'class-header' => 'with-border',
            'box-title' => isset($options['box-title']) ? $options['box-title'] : $this->title,
            'box-footer' => isset($options['box-footer']) ? $options['box-footer'] : '',
        ],
    ]) ?>

</div>

