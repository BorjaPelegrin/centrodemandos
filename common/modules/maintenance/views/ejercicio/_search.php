<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\maintenance\searchs\EjercicioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ejercicio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ejercicio') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'video') ?>

    <?= $form->field($model, 'file') ?>

    <?= $form->field($model, 'id_zona') ?>

    <?php // echo $form->field($model, 'id_tipo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
