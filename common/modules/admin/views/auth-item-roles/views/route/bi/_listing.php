<?php

$permisos =[
    [
        NOMBRE => 'página-principal-de-los-listados',
        RUTA => '/listing/default/index',
        'sub' => [
            [
                NOMBRE => 'listado-de-Solicitudes',
                RUTA => '/listing/list-patient-leads/index',
            ],
            [
                NOMBRE => 'listado-de-Solicitudes-PDF',
                RUTA => '/listing/list-patient-leads/print-all',
            ],
            [
                NOMBRE => 'listado-de-Solicitudes-Excel',
                RUTA => '/listing/list-patient-leads/export-to-excel',
            ],
            [
                NOMBRE => 'listado-de-Presupuestos',
                RUTA => '/listing/list-patient-budgets/index',
            ],
            [
                NOMBRE => 'listado-de-Presupuestos-PDF',
                RUTA => '/listing/list-patient-budgets/print-all',
            ],
            [
                NOMBRE => 'listado-de-Presupuestos-Excel',
                RUTA => '/listing/list-patient-budgets/export-to-excel',
            ],
            [
                NOMBRE => 'listado-de-Cobros',
                RUTA => '/listing/list-patient-payments/index',
            ],
            [
                NOMBRE => 'listado-de-Cobros-PDF',
                RUTA => '/listing/list-patient-payments/print-all',
            ],
            [
                NOMBRE => 'listado-de-Cobros-Excel',
                RUTA => '/listing/list-patient-payments/export-to-excel',
            ],
            [
                NOMBRE => 'listado-de-Sesiones',
                RUTA => '/listing/list-patient-sessions/index',
            ],
            [
                NOMBRE => 'listado-de-Sesiones-PDF',
                RUTA => '/listing/list-patient-sessions/print-all',
            ],
            [
                NOMBRE => 'listado-de-Sesiones-Excel',
                RUTA => '/listing/list-patient-sessions/export-to-excel',
            ],
            [
                NOMBRE => 'listado-de-Pacientes',
                RUTA => '/listing/list-patient-treatment/index',
            ],
            [
                NOMBRE => 'listado-de-Pacientes-PDF',
                RUTA => '/listing/list-patient-treatment/print-all',
            ],
            [
                NOMBRE => 'listado-de-Pacientes-Excel',
                RUTA => '/listing/list-patient-treatment/export-to-excel',
            ],
            [
                NOMBRE => 'listado-de-Resultado',
                RUTA => '/listing/list-patient-treatment-result/index',
            ],
            [
                NOMBRE => 'listado-de-Resultado-PDF',
                RUTA => '/listing/list-patient-treatment-result/print-all',
            ],
            [
                NOMBRE => 'listado-de-Resultado-Excel',
                RUTA => '/listing/list-patient-treatment-result/export-to-excel',
            ],
            [
                NOMBRE => 'listado-de-Reservas de quirófanos',
                RUTA => '/listing/list-reservations/index',
            ],
        ],
    ],
    [
        NOMBRE => 'imprimir-listado',
        RUTA => '/listing/list/print-list',
        'sub' => [
            [
                NOMBRE => 'exportar-excel-listado',
                RUTA => '/listing/list/export-to-excel',
            ],
            [
                NOMBRE => 'listado-Antiguos-contactos',
                RUTA => '/listing/list/antiguos-contactos',
            ],
            [
                NOMBRE => 'listado-Pacientes-vino-no-vino',
                RUTA => '/listing/list/pacientes-vino-no-vino',
            ],
            [
                NOMBRE => 'listado-Cumpleaños',
                RUTA => '/listing/list/birthday',
            ],
            [
                NOMBRE => 'listado-Pacientes-por-edades',
                RUTA => '/listing/list/pacientes-edades',
            ],
            [
                NOMBRE => 'listado-Pacientes-por-tratamiento',
                RUTA => '/listing/list/pacientes-tratamiento',
            ],
            [
                NOMBRE => 'listado-Produción-del-cirujano',
                RUTA => '/listing/list/produccion-cirujano',
            ],
            [
                NOMBRE => 'listado-Produción-del-ginecologo',
                RUTA => '/listing/list/produccion-ginecologo',
            ],
            [
                NOMBRE => 'listado-Produción-pendiente',
                RUTA => '/listing/list/produccion-pendiente',
            ],
            [
                NOMBRE => 'listado-Produción-pendiente-realizar',
                RUTA => '/listing/list/produccion-pendiente-realizar',
            ],
            [
                NOMBRE => 'listado-Produción-realizada',
                RUTA => '/listing/list/produccion-realizada',
            ],
            [
                NOMBRE => 'listado-Tratamientos-abonados-exentos-IVA',
                RUTA => '/listing/list/exempt-from-tax',
            ],
            [
                NOMBRE => 'listado-Agenda-diaria',
                RUTA => '/listing/list/daily-schedule',
            ],
            [
                NOMBRE => 'listado-Citas-previstas-por-empleado',
                RUTA => '/listing/list/citas-previstas',
            ],
            [
                NOMBRE => 'listado-Puntos-VIP-card',
                RUTA => '/listing/list/vip-card',
            ],
            [
                NOMBRE => 'listado-Paciente-missing',
                RUTA => '/listing/list/paciente-missing',
            ],
            [
                NOMBRE => 'listado-Pacientes-por-importe',
                RUTA => '/listing/list/pacientes-importe',
            ],
            [
                NOMBRE => 'listado-Renovables',
                RUTA => '/listing/list/renovables',
            ],
            [
                NOMBRE => 'listado-Tratamientos-shop-online',
                RUTA => '/listing/list/tratamientos-shop-online',
            ],
            [
                NOMBRE => 'listado-Tratamientos-validados-pendientes-de-dar-la-primera-cita',
                RUTA => '/listing/list/tratamientos-abonados-primera-visita',
            ],
            [
                NOMBRE => 'listado-Tratamientos-abonados-pendientes-de-validar',
                RUTA => '/listing/list/tratamientos-abonados-pendiente-validar',
            ],/*
            [
                NOMBRE => 'listado-Objetivos-clínica',
                RUTA => '/listing/list/objetivos-clinica',
            ],
            [
                NOMBRE => 'listado-Proyección',
                RUTA => '/listing/list/proyeccion',
            ],
            [
                NOMBRE => 'listado-Hoja-de-datos',
                RUTA => '/listing/list/hoja-datos',
            ],*/
            [
                NOMBRE => 'listado-Control-de-contratos',
                RUTA => '/listing/list/control-contratos',
            ],
            [
                NOMBRE => 'listado-comunicaciones-Renovables',
                RUTA => '/listing/list/communication',
            ],
            [
                NOMBRE => 'listado-diagnostico-online',
                RUTA => '/listing/list/report_online',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'listing/default/index',
    'url' => 'http://backend.minerva.lan/listing/default/index',
]);
?>
