<?php

$permisos =[
    [
        NOMBRE => 'página-principal-del-cuadro-de-mandos',
        RUTA => '/bi/cockpit/index',
        'sub' => [
            [
                NOMBRE => 'Cuadro-Asesores',
                RUTA => '/bi/cockpit/asesores',
            ],
            [
                NOMBRE => 'Cuadro-Especialidad',
                RUTA => '/bi/cockpit/especialidad',
            ],
            [
                NOMBRE => 'Cuadro-Subespecialidad',
                RUTA => '/bi/cockpit/subespecialidad',
            ],
            [
                NOMBRE => 'Cuadro-Tratamiento',
                RUTA => '/bi/cockpit/tratamiento',
            ],
            [
                NOMBRE => 'Cuadro-Grupos',
                RUTA => '/bi/cockpit/grupos',
            ],
            [
                NOMBRE => 'Cuadro-Clínica',
                RUTA => '/bi/cockpit/clinica',
            ],
            [
                NOMBRE => 'Cuadro-Cirujano',
                RUTA => '/bi/cockpit/cirujano',
            ],
            [
                NOMBRE => 'Cuadro-Canal',
                RUTA => '/bi/cockpit/canal',
            ],
            [
                NOMBRE => 'Cuadro-Origen',
                RUTA => '/bi/cockpit/origen',
            ],
            [
                NOMBRE => 'Cuadro-Motivo',
                RUTA => '/bi/cockpit/motivo',
            ],
            [
                NOMBRE => 'Cuadro-Grupos-Padres',
                RUTA => '/bi/cockpit/grupos-padres',
            ],
            [
                NOMBRE => 'Cuadro-Formas-de-cobro',
                RUTA => '/bi/cockpit/formas-de-cobro',
            ],
            [
                NOMBRE => 'Cuadro-Entidades-Financiadoras',
                RUTA => '/bi/cockpit/entidades-financiadoras',
            ],
            [
                NOMBRE => 'Cuadro-Camapaña',
                RUTA => '/bi/cockpit/camapana',
            ],
            [
                NOMBRE => 'Cuadro-Anuncio',
                RUTA => '/bi/cockpit/anuncio',
            ],
            [
                NOMBRE => 'Cuadro-Formas-de-cobro-por-columnas',
                RUTA => '/bi/cockpit/formas-de-cobro-2',
            ],
        ],
    ],
    [
        NOMBRE => 'exportar-cuadro-excel',
        RUTA => '/bi/cockpit/export-to-excel',
        'sub' => [
            [
                NOMBRE => 'exportar-excel-cuadro-formas-de-pago-por-columnas',
                RUTA => '/bi/cockpit/export-to-excel-forma-pago-column',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'bi/cockpit/index',
    'url' => 'http://backend.minerva.lan/bi/cockpit/index',
]);
?>