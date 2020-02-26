<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\maintenance\searchs\ZonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zonas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zona-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Zona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_zona',
            'name',
            'is_archived',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
