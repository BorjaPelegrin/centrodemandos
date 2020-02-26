<?php

use common\classes\Html;
use common\widgets\Input;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\OauthAccessToken */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-oauth-access-token',
        'action' => 'login',
        'method' => 'GET',
    ]); ?>

    <?= Input::widget(['view' => 'select2',
        'items' => [
            'model' => $model,
            'attribute' => 'id_area',
            'data' => \common\modules\treatments\models\Area::getDropDownList(),
            'withoutModel' => true,
        ]
    ])
    ?>

    <?= Input::widget(['view' => 'select2',
        'items' => [
            'model' => $model,
            'attribute' => 'alias',
            'data' => ['my_business' => 'Google My Business'],
            'withoutModel' => true,
        ]
    ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
