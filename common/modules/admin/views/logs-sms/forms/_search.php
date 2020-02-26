<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\searchs\LogsSmsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logs-sms-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'area_id')->widget(Select2::classname(), [
                'data' => \common\modules\treatments\models\Area::getDropDownList(Yii::$app->people->clinicSelected()->id_clinic),
                'language' => 'es',
                'options' => ['placeholder' => 'Área'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'phone') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'service')->widget(Select2::classname(), [
                'data' => [],
                'language' => 'es',
                'options' => ['placeholder' => 'Servicio'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
    </div>

    <?= $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
