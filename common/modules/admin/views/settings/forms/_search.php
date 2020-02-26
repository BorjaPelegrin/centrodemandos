<?php

use common\classes\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\searchs\SettingsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="settings-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_setting') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'associated_tb') ?>

    <?= $form->field($model, 'associated_id') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'value') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
