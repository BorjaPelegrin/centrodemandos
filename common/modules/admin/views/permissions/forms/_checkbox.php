<?php

use common\classes\Html;
use yii\widgets\ActiveForm;
use \kartik\checkbox\CheckboxX;

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

$pluginOptions = [
    'size'=>'xs',
    'threeState'=>false,
];
?>

<div class="permission-form" style="margin-bottom:-15px">
    <?php $form = ActiveForm::begin([
        'id' => 'form-permission-'.$id,
        'action' => ['/admin/permission/update-permission'],
    ]); ?>

        <?= $form->field($model, 'allow')->widget(CheckboxX::classname(),[
            'name' => $model->route,
            'autoLabel' => true,
            'labelSettings' => [
                'label' => ucfirst(str_replace("-"," ",$id)) . $comentario,
                'position' => CheckboxX::LABEL_RIGHT,
                'options' => [
                    'data-toggle' => 'tooltip',
                    'title' => $model->route,
                ],
            ],
            'value' => in_array($model->route, $result),
            'options' => [
                'id' => $id,
            ],
            'pluginOptions' => $pluginOptions,
            'pluginEvents' => [
                "change" => "function(e) { $('#form-permission-$id').submit(); }",
            ]
        ])->label(false);?>

    <?= $form->field($model, 'route')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'id_user')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'id_role')->hiddenInput()->label(false); ?>

    <?php ActiveForm::end(); ?>
</div>