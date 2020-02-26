<?php

use common\classes\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\OauthAccessToken */

$this->title = 'Añadir nuevo Access Token';
$this->params['breadcrumbs'][] = ['label' => 'Access Token', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$options['class'] = 'box-pink';
$options['box-footer'] = 'Añadir nuevo token';

$buttons = [
    Html::a('<i class="fa fa-arrow-circle-left"></i> Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']),
];
?>
<div class="auth-item-child-create">

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
