<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\maintenance\searchs\EjercicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ejercicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejercicio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ejercicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ejercicio',
            'name',
            'video',
            'file',
            'id_zona',
            //'id_tipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
