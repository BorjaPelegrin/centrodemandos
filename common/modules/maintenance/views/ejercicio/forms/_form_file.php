<?php

use common\classes\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\modules\crm\models\CrmTickets */
/* @var $modelMedia \common\modules\media\models\Media */
/* @var $form yii\widgets\ActiveForm */

$url = \yii\helpers\Url::to(['/crm/tickets/upload-file']);
$this->registerJs('
    $(\'#form-crm-view-tickets\').on(\'beforeSubmit\', function(e) {
        var form = $(this);
        //var formData = form.serialize();
        var formData = new FormData($(\'#form-crm-view-tickets\')[0]);
        console.log(formData)
        $.ajax({
            url: "'.$url.'?id="+'.$id.',
            type: "POST",
            data: formData,
            success: function (data) {
                location.reload();
                return false;
            },
            error: function (e) {
                console.log(e);
                krajeeDialog.alert("<div class=\"alert alert-danger\">Se ha producido un error, a continuación se muestra el detalle del error: </div>"+e.responseText);
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    }).on(\'submit\', function(e){
        e.preventDefault();
    });
', \yii\web\view::POS_READY);
?>

<div class="crm-tickets-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-entrenamiento',
        'options' => ['enctype'=>'multipart/form-data'],
    ]); ?>

    <div class="row">
        <div class="col-md-12">
            <?php
            echo $form->field($modelMedia, "file[]")->widget(FileInput::className(), [
                'language' => 'es',
                'options' => [
                    'multiple' => true,
                    'accept' => 'image/*',
                ],
                'pluginOptions' => [
                    'showUpload' => false,
                    'removeClass' => 'btn btn-danger',
                    'browseClass' => 'btn btn-success',
                    'layoutTemplates' => [
                        'main1' => '<div style="margin-bottom: 5px; margin-top: 5px; text-align: right">{remove}{browse}</div>{preview}',
                    ],
                ],
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="form-group" style="text-align: right">
        <?= Html::submitButton('Subir archivos', [
            'class' => 'btn btn-primary',
            'data-toggle' => 'tooltip',
            'title' => 'Subir archivos',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
