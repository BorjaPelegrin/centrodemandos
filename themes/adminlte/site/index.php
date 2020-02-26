<?php

use yii\bootstrap\Tabs;

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Bienvenido</h1>

<?php
    /*
    echo Tabs::widget([
        'navType' => 'nav-pills',
        'items' => [
            [
                'label' => 'Leads',
                'content' => Yii::$app->view->render('details/_leads', [
                    //'model' => $model,
                ]),
                'active' => false
            ],
            [
                'label' => 'Pacientes',
                'content' => Yii::$app->view->render('details/_patients', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]),
                'active' => false
            ],
            [
                'label' => 'Agenda',
                'content' => Yii::$app->view->render('details/_calendar', [
                    //'model' => $model,
                ]),
                'active' => false
            ],
        ],
    ]);
    */
?>