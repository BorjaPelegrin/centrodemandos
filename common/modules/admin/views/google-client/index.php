<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\admin\searchs\OauthAccessTokenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Access Token';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oauth-access-token-index">

        <?=  \themes\adminlte\widgets\AdminlteBox::widget([
            'buttons' => [Html::a('Generar Token', ['create'], ['class' => 'btn btn-success'])],
            'content' => $this->render('views/_grid_generic', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider
            ]) ,
            'options' => [
                'class' => 'box-pink',
                'class-header' => 'with-border',
                'box-title' => 'Access Token',
            ],
        ]); ?>

</div>
