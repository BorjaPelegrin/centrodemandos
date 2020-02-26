<?php

use common\classes\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\PermissionForm */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs('
    $(\'form\').on(\'beforeSubmit\', function(e) {
        var form = $(this);
        var formData = form.serialize();
        $.ajax({
            url: form.attr("action"),
            type: form.attr("method"),
            data: formData,
            success: function (data) {
                if (data == "Error") {
                    alert("Hay un error");
                } else {
                    
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
        });
    }).on(\'submit\', function(e){
        e.preventDefault();
    });
',\yii\web\View::POS_READY);
?>

<div class="permission-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-permission-'.$id,
        'action' => ['/admin/permission/update-permission'],
    ]); ?>

    <div class="row">
        <div class="col-md-2">
            <?= Yii::t('controllers', $route) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'index')->checkbox([
                'onchange' => '
                    $(\'#form-permission-'.$id.'\').submit();
                '
            ]); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'view')->checkbox([
                'onchange' => '
                    $(\'#form-permission-'.$id.'\').submit();
                '
            ]); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'create')->checkbox([
                'onchange' => '
                   $(\'#form-permission-'.$id.'\').submit();
                '
            ]); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'update')->checkbox([
                'onchange' => '
                    $(\'#form-permission-'.$id.'\').submit();
                '
            ]); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'delete')->checkbox([
                'onchange' => '
                    $(\'#form-permission-'.$id.'\').submit();
                '
            ]); ?>
        </div>

        <?= $form->field($model, 'route')->hiddenInput()->label(false); ?>
        <?= $form->field($model, 'id_user')->hiddenInput()->label(false); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>