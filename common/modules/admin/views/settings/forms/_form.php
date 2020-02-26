<?php

use common\classes\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\Settings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="settings-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-settings'
    ]); ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'associated_tb')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'associated_id')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'value')->widget(alexantr\ace\Ace::className(), [
                'mode' => 'html',
                'containerOptions' => [
                    'style' => 'min-height:400px', // ...or this style
                ]
            ]) ?>
        </div>
    </div>

    <div class="form-group" style="display: none;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
