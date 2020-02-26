<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\maintenance\models\Zona */

$this->title = 'Update Zona: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Zonas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_zona]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
