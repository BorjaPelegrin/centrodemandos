<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\maintenance\models\Zona */

$this->title = 'Añadir nuevo Zona';
$this->params['breadcrumbs'][] = ['label' => 'Zonas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$options['class'] = 'box-warning';
$options['box-footer'] = 'Añadir nuevo registro';

?>
<div class="zona-create">

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
