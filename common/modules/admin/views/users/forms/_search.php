<?php

use common\classes\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\searchs\UsersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'username') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'email') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'access_token') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
