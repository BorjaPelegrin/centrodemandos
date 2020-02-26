<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-entity-form">

    <h3>Configuración de la entidad relacionada:</h3>

    <?php $form = ActiveForm::begin([
        'id' => 'form-user-entity',
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'associated_tb')->dropDownList(
        Yii::$app->params['entity_associated_tb'],
        ['prompt'=>'']
    ) ?>

    <?= $form->field($model, 'associated_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'extra_data')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['maxlength' => true])->label(false); ?>

    <?= $form->field($model, 'clinics')->widget(Select2::classname(), [
        'data' =>  \common\modules\clinic\models\Clinic::getDropDownList(),
        'language' => 'es',
        'options' => [
            //'placeholder' => 'Selecciona el número',
            'multiple' => true,
        ],
        'pluginOptions' => [
            'allowClear' => false,
        ],
    ]); ?>

    <div class="box-footer btn-group pull-right">
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
