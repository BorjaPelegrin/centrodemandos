<?php

use common\classes\Html;

$clinics = \Yii::$app->people->clinicsByEmployee();
$clinicSelected = \Yii::$app->people->clinicSelected();
?>

<!-- Clinics: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Clinica">
        <?= $clinicSelected->name; ?>
    </a>
    <ul class="dropdown-menu">
        <?php if (count($clinics) > 1) : ?>
            <li class="header">Selecciona la clínica</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu" style="max-height: 550px;">
                    <?php foreach ($clinics as $clinic) {
                        if ($clinic['id_clinic'] != $clinicSelected->id_clinic) {
                            echo '<li>';
                            echo Html::a(
                                $clinic['nombreClinica'].' / '.$clinic['descripcionPuesto'],
                                ['/clinic/clinic/select'],
                                [
                                    'class' => '',
                                    'data' => [
                                        'params' => [
                                            'idClinic'=>$clinic['id_clinic_employee'],
                                        ],
                                        //'confirm' => "Are you sure you want to delete profile?",
                                        'method' => 'post',
                                    ],
                                ]
                            );
                            echo '</li>';
                        }
                    } ?>
                </ul>
            </li>
        <?php endif ?>
    </ul>
</li>