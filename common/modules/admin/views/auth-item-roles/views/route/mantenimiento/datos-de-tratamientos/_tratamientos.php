<?php

/* @var $parent */

use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'crear-nuevo-tratamiento',
        RUTA => '/treatments/treatment/create',
        'sub' => [
            [
                NOMBRE => 'cambiar-tarifas',
                RUTA => '/treatments/treatment-rates/change',
            ],
            [
                NOMBRE => 'importar-tratamientos-csv',
                RUTA => '/treatments/treatment/import-csv',
            ],
            [
                NOMBRE => 'exportar-tratamientos-excel',
                RUTA => '/treatments/treatment/export-to-excel',
            ],
            [
                NOMBRE => 'imprimir-tratamientos-pdf',
                RUTA => '/treatments/treatment/print-all',
            ],
        ],
    ],
    [
        NOMBRE => 'ver-info-tratamiento',
        RUTA => '/treatments/treatment/view',
        'sub' => [
            [
                NOMBRE => 'actualizar-tratamiento',
                RUTA => '/treatments/treatment/update',
            ],
            [
                NOMBRE => 'activar-desactivar-tratamiento',
                RUTA => '/treatments/treatment/change-to-archived',
            ],
        ],
    ],
    [
        NOMBRE => 'campo-nombre-tratamiento',
        RUTA => 'updateNameTreatment',
        'sub' => [
            [
                NOMBRE => 'campo-precio-tratamiento',
                RUTA => 'updatePriceTreatment',
            ],
            [
                NOMBRE => 'campo-precio-especial-tratamiento',
                RUTA => 'updateSpecialPriceTreatment',
            ],
            [
                NOMBRE => 'campo-plazas-limitadas-tratamiento',
                RUTA => 'updateLimitedOfferTreatment',
            ],
            [
                NOMBRE => 'campo-reserva-tratamiento',
                RUTA => 'updateReserveTreatment',
            ],
            [
                NOMBRE => 'campo-coste-tratamiento',
                RUTA => 'updateCostTreatment',
            ],
            [
                NOMBRE => 'campo-descuento-maximo-tratamiento',
                RUTA => 'updateMaxDiscountTreatment',
            ],
            [
                NOMBRE => 'campo-vip-card-tratamiento',
                RUTA => 'updateVipCardTreatment',
            ],
            [
                NOMBRE => 'campo-tipo-tratamiento-tratamiento',
                RUTA => 'updateTreatmentTypeTreatment',
            ],
            [
                NOMBRE => 'campo-tasa-defecto-tratamiento',
                RUTA => 'updateDefaultIdTaxTreatment',
            ],
            [
                NOMBRE => 'campo-descripcion-tratamiento',
                RUTA => 'updateDescriptionTreatment',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'treatments/treatment/index',
    'url' => 'http://backend.minerva.lan/treatments/treatment/index',
]);

?>
<strong>Las pestañas del tratamiento no tienen permisos</strong>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'treatmentPermissionTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Clinicas',
            CONTENT => Yii::$app->view->render('pestanas/clinicas', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Centros colaboradores',
            CONTENT => Yii::$app->view->render('pestanas/centros_colaboradores', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Formularios',
            CONTENT => Yii::$app->view->render('pestanas/formularios', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Motivos de baja',
            CONTENT => Yii::$app->view->render('pestanas/motivos_baja', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Tratamientos relacionados',
            CONTENT => Yii::$app->view->render('pestanas/tratamientos_relacionados', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Sesiones',
            CONTENT => Yii::$app->view->render('pestanas/sesiones', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Gastos asociados',
            CONTENT => Yii::$app->view->render('pestanas/gastos_asociados', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Web',
            CONTENT => Yii::$app->view->render('pestanas/web', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Archivos',
            CONTENT => Yii::$app->view->render('pestanas/archivos', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Programar envíos de renovación',
            CONTENT => Yii::$app->view->render('pestanas/programar-envios-renovacion', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
    ],
]) ?>
