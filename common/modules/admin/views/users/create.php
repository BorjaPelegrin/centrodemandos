<?php

use common\classes\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\Users */

$this->title = 'Nuevo usuario';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$options['class'] = 'box-pink';

$buttons = [
    Html::a('<i class="fa fa-bars"></i> Listado', ['index'], ['class' => 'btn btn-primary']),
    // Html::a('<i class="fa fa-arrow-circle-left"></i> Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']),
];
?>
<div class="users-create">

    <?= @themes\adminlte\widgets\AdminlteBox::widget([
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
