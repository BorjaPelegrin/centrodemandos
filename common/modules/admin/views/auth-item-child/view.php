<?php

use common\classes\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\AuthItemChild */

$this->title = 'Viendo registro';
$this->params['breadcrumbs'][] = ['label' => 'Auth Item Children', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$options['class'] = 'box-pink';
$options['box-footer'] = 'Viendo registro';

$buttons = [
    Html::a('<i class="fa fa-pencil"></i> Actualizar', ['create'], ['class' => 'btn btn-primary']),
    Html::a('<i class="fa fa-trash"></i> Eliminar', ['export-allto-excel'], ['class' => 'btn btn-danger']),
];
?>
<div class="auth-item-child-view">

   <?= @themes\adminlte\widgets\AdminlteBox::widget([
        'buttons' => $buttons,
        'content' => $this->render('views/_detail', [
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
