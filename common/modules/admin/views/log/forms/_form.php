<?php

use common\classes\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\Log */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_log')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'log')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_creation')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
