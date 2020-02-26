<?php

use common\classes\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\Settings */

$this->title = 'Actualizar configuración: ' . $model->id_setting;
$this->params['breadcrumbs'][] = ['label' => 'Configuraciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view', 'id' => $model->id_setting]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="settings-update">

    <!-- box widget -->
    <div class="box box-pink">
        <div class="box-header">
            <i class="fa fa-bars"></i>
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            <!-- tools box -->
            <div class="pull-right box-tools">

            </div>
            <!-- /. tools -->
        </div>
        <div class="box-body">
            <?= $this->render('forms/_form', [
            'model' => $model,
            ]) ?>
        </div>
        <div class="box-footer clearfix">
            Actualizando registro
            <?= Html::a('Guardar <i class="fa fa-arrow-circle-right"></i>', '#', [
            'onclick' => '$(\'#form-settings\').yiiActiveForm(\'submitForm\');',
            'class' => 'pull-right btn btn-success'
            ]) ?>
        </div>
    </div>

</div>
