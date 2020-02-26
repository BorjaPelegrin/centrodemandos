<?php

use common\classes\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-auth-item-child'
    ]); ?>

    <?= $form->field($model, 'parent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'child')->textInput(['maxlength' => true]) ?>

    <div class="form-group" style="display: none;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
