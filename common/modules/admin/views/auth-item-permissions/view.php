<?php

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\AuthItem */

$this->title = 'Permiso';
$this->params['breadcrumbs'][] = ['label' => 'Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-items-view">

    <div class="row">
        <div class="col-md-3">
            <?= $this->render('views/_detail', [
                'model' => $model
            ]) ?>
        </div>
        <div class="col-md-9">
            <?= @themes\custom\widgets\AdminlteBox::widget([
                'buttons' => $buttons,
                'content' => $this->render('views/_related', [
                    'model' => $model
                ]),
                'options' => [
                    'class' => isset($options['class']) ? $options['class'] : 'box-primary',
                    'class-header' => 'with-border',
                    'box-title' => 'Información relacionada',
                ],
            ]) ?>
        </div>
    </div>

</div>
