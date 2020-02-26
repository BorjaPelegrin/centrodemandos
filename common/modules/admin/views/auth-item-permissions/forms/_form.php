<?php

use common\classes\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-items-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-permissions',
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php // <?= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>

    <?php // <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <div class="form-group" style="text-align: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= $form->field($model, 'type')->hiddenInput()->label(false) ?>

    <?php ActiveForm::end(); ?>

</div>
