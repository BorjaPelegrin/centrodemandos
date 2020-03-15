<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\maintenance\models\Ejercicio */

$this->title = 'Añadir nuevo Ejercicio';
$this->params['breadcrumbs'][] = ['label' => 'Ejercicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$options['class'] = 'box-warning';
$options['box-footer'] = 'Añadir nuevo registro';

?>
<div class="ejercicio-create">

   <?= @themes\custom\widgets\AdminlteBox::widget([
        'buttons' => $buttons,
        'content' => $this->render('forms/_form', [
            'model' => $model,
        ]),
        'options' => [
            'class' => isset($options['class']) ? $options['class'] : 'box-warning',
            'class-header' => 'with-border',
            'box-title' => isset($options['box-title']) ? $options['box-title'] : $this->title,
            'box-footer' => isset($options['box-footer']) ? $options['box-footer'] : '',
        ],
    ]) ?>

</div>
