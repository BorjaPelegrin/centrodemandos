<?php

use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'añadir-llamada-call',
        RUTA => '/callcenter/call-communication/add-call',
        'sub' => [
            [
                NOMBRE => 'añadir-solicitud-call',
                RUTA => '/callcenter/call-communication/add-lead',
            ],
            [
                NOMBRE => 'desplegable-tratamientos-call',
                RUTA => '/treatments/treatment/drop-down-treatment-by-clinic',
            ],
            [
                NOMBRE => 'buscador-pacientes-todas-clinicas',
                RUTA => '/people/patient/patient-list-all-dbs',
            ],
            [
                NOMBRE => 'ver-solicitud-call',
                RUTA => '/callcenter/call-communication/view',
            ],
            [
                NOMBRE => 'actualizar-solicitud-call',
                RUTA => '/callcenter/call-communication/update',
            ],
            [
                NOMBRE => 'borrar-solicitud-call',
                RUTA => '/callcenter/call-communication/delete',
            ],
            [
                NOMBRE => 'ver-solicitud-paciente-call',
                RUTA => '/people/lead/view',
            ],
            [
                NOMBRE => 'añadir-cita-call',
                RUTA => '/calendar/event/schedule',
            ],
            [
                NOMBRE => 'recitar-call',
                RUTA => '/calendar/event/reschedule',
            ],
            [
                NOMBRE => 'confirmar-cita-call',
                RUTA => '/patient/visit/confirm',
            ],
            [
                NOMBRE => 'cancelar-cita-call',
                RUTA => '/calendar/event/cancel',
            ],
            [
                NOMBRE => 'ver-paciente-call',
                RUTA => '/people/patient/view',
            ],
            [
                NOMBRE => 'ver-mapa-call',
                RUTA => '/clinic/clinic/view-map',
            ],
            [
                NOMBRE => 'recitar-en-el-call',
                RUTA => '/callcenter/call-communication/reschedule',
            ],
            [
                NOMBRE => 'limpiar-evento-call',
                RUTA => '/callcenter/call-communication/clean-event',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>

