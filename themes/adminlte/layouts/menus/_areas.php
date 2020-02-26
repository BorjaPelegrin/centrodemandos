<?php

use common\classes\Html;

$areas = \Yii::$app->treatments->areasByEmployee();
if (count($areas) == 0) {
    $areas = \Yii::$app->treatments->areasByClinic();
}
/*
 * SE quita para que se puedan ver los pacientes sin leads
 * if (count($areas) == 1) {
    \Yii::$app->session->set('user.id_area', $areas[0]->id_area);
}*/
$areaSelect = \Yii::$app->treatments->areaSelected();
?>

<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Areas">
        Área: <?= $areaSelect ? $areaSelect->description : 'Todas'; ?>
    </a>
    <ul class="dropdown-menu">
        <?php if (count($areas) >= 1) : ?>
            <li class="header">Selecciona el área</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li>
                        <?= !is_null($areaSelect) ? Html::a(
                            'Todas',
                            ['/treatments/area/select'],
                            [
                                'class' => '',
                                'data' => [
                                    'params' => [
                                        'idArea' => null
                                    ],
                                    //'confirm' => "Are you sure you want to delete profile?",
                                    'method' => 'post',
                                ],
                            ]
                        ) : ''; ?>
                    </li>
                    <?php foreach ($areas as $area) {
                        if (is_null($areaSelect)) {
                            echo '<li>';
                            //$url = $area->idArea ? $area->idArea->image : '#';
                            $url = \Yii::$app->treatments->getAreaById($area->id_area);
                            echo Html::a(
                                Html::img($url, ['style'=>'width:23px;border-radius:2px;']). ' ' . $area->idArea->description,
                                ['/treatments/area/select'],
                                [
                                    'class' => '',
                                    'data' => [
                                        'params' => [
                                            'idArea' => $area->id_area
                                        ],
                                        //'confirm' => "Are you sure you want to delete profile?",
                                        'method' => 'post',
                                    ],
                                ]
                            );
                            echo '</li>';
                        } else {
                            if ($area->id_area != $areaSelect->id_area) {
                                echo '<li>';
                                echo Html::a(
                                    $area->idArea->description,
                                    ['/treatments/area/select'],
                                    [
                                        'class' => '',
                                        'data' => [
                                            'params' => [
                                                'idArea' => $area->id_area
                                            ],
                                            //'confirm' => "Are you sure you want to delete profile?",
                                            'method' => 'post',
                                        ],
                                    ]
                                );
                                echo '</li>';
                            }
                        }
                    } ?>
                </ul>
            </li>
        <?php endif ?>
    </ul>
</li>