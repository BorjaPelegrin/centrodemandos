<?php

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\AuthItem */

$this->title = 'Rol - '. ucfirst ($model->description);
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-items-view">

    <div class="row">
        <div class="col-md-3">
            <?= @themes\custom\widgets\AdminlteBox::widget([
                'buttons' => $buttons,
                'content' => $this->render('views/_info', [
                    'model' => $model
                ]),
                'options' => [
                    'class' => isset($options['class']) ? $options['class'] : 'box-primary',
                    'class-header' => 'with-border',
                    'box-title' => 'Role',
                ],
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
                    'box-title' => 'Permisos asignados al role',
                ],
            ]) ?>
        </div>
    </div>

</div>
