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
        <div class="col-md-4">

            <?php
                if (!isset($action)) {
                    if (isset($ro[4])) {
                        $action = $ro[4];
                        $controller = $ro[3];
                    } else {
                        $action = $ro[3];
                        $controller = $ro[2];
                    }
                }
            echo Yii::$app->permission->getAction($controller, $action);
                //echo $action
            ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'allow')->checkbox([
                'onchange' => '
                    $(\'#form-permission-'.$id.'\').submit();
                '
            ]); ?>
        </div>


    <?= $form->field($model, 'route')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'id_user')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'id_role')->hiddenInput()->label(false); ?>

    <?php ActiveForm::end(); ?>
</div>

    <!--<hr>-->
