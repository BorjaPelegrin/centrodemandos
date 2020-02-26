<?php

use common\classes\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\searchs\LogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_log') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'log') ?>

    <?= $form->field($model, 'date_creation') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
