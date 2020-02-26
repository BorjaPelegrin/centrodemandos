<?php

$permisos =[
    [
        NOMBRE => 'inicio',
        RUTA => '/dashboard/dashboard/index',
        'sub' => [
            [
                NOMBRE => 'botón-PEPs',
                RUTA => '/historical/patient-treatment/index',
            ],
            [
                NOMBRE => 'gráficas',
                RUTA => 'dashboard',
            ],
            [
                NOMBRE => 'ranking-inicio',
                RUTA => 'ranking',
            ],
        ],
    ],
    [
        NOMBRE => 'agenda',
        RUTA => '/calendar/event/basic-schedule'
    ],
    [
        NOMBRE => 'mi-agenda',
        RUTA => '/calendar/event/my-schedule'
    ],
    [
        NOMBRE => 'solicitudes',
        RUTA => '/people/lead/index'
    ],
    [
        NOMBRE => 'pacientes',
        RUTA => '/people/patient/create-with-lead',
        'sub' => [
            [
                NOMBRE => 'añadir-codigo-postal-creacion-paciente',
                RUTA => '/people/city/city',
            ],
        ]
    ],
    [
        NOMBRE => 'mis-pacientes',
        RUTA => '/people/patient/my-patients'
    ],
    [
        NOMBRE => 'calidad',
        RUTA => 'menu_quality',
        'sub' => [
            [
                NOMBRE => 'encuestas',
                RUTA => '/quality/polls/index',
            ],
            [
                NOMBRE => 'informes-de-llamadas',
                RUTA => '/quality/call-report/index',
            ],
        ],
    ],
    [
        NOMBRE => 'call-center',
        RUTA => 'menu_callcenter',
        'sub' => [
            [
                NOMBRE => 'llamadas',
                RUTA => '/callcenter/call-communication/index',
            ],
        ],
    ],
    [
        NOMBRE => 'marketing',
        RUTA => 'menu_marketing',
        'sub' => [
            [
                NOMBRE => 'solicitudes-online',
                RUTA => '/people/leads/index',
            ],
            [
                NOMBRE => 'canales',
                RUTA => '/people/channel/index',
            ],
            [
                NOMBRE => 'orígenes',
                RUTA => '/maintenance/origin/index',
            ],
            [
                NOMBRE => 'campañas',
                RUTA => '/marketing/marketing-campaign/index',
            ],
            [
                NOMBRE => 'anuncios',
                RUTA => '/marketing/marketing-ad/index',
            ],
            [
                NOMBRE => 'formularios-landing',
                RUTA => '/marketing/landingpage/index',
            ],
            [
                NOMBRE => 'comunicaciones',
                RUTA => '/communication/communication/index',
            ],
            [
                NOMBRE => 'acortador-Url',
                RUTA => '/marketing/short-url/index',
            ],
            [
                NOMBRE => 'reviews',
                RUTA => '/marketing/reviews/index',
            ],
            [
                NOMBRE => 'motivos-de-consulta',
                RUTA => '/marketing/consultation-reason/index',
            ],
            [
                NOMBRE => 'agrupación-de-motivos-de-consulta',
                RUTA => '/marketing/consultation-reason-group/index',
            ],
        ],
    ],
    [
        NOMBRE => 'comercial',
        RUTA => 'menu_commerce',
        'sub' => [
            /*[
                NOMBRE => 'plan-de-ventas',
                RUTA => '/bi/sales-plan/index',
            ],*/
            [
                NOMBRE => 'parrilla',
                RUTA => '/bi/grid/index',
            ],
            [
                NOMBRE => 'menú-proyección',
                RUTA => 'menu_maint_projection',
            ],
            [
                NOMBRE => 'proyección-manual',
                RUTA => '/bi/projection/view',
            ],
            [
                NOMBRE => 'proyección-automatica',
                RUTA => '/bi/projection/index',
            ],
            [
                NOMBRE => 'hoja-de-datos',
                RUTA => '/bi/data-sheet/index',
            ],
            [
                NOMBRE => 'objetivos-clinica',
                RUTA => '/bi/clinic-goal/index',
            ],
            [
                NOMBRE => 'control-de-visitas',
                RUTA => '/bi/control-visits/index',
            ],
            [
                NOMBRE => 'ranking-comercial',
                RUTA => '/bi/ranking/index',
            ],
        ],
    ],
    [
        NOMBRE => 'stock',
        RUTA => 'menu_stock',
        'sub' => [
            [
                NOMBRE => 'proveedores',
                RUTA => '/stock/provider/index',
            ],
            [
                NOMBRE => 'grupos-de-proveedores',
                RUTA => '/stock/provider-group/index',
            ],
            [
                NOMBRE => 'artículos',
                RUTA => '/resources/resource/index',
            ],
            [
                NOMBRE => 'compras',
                RUTA => '/financials/order/index',
            ],
            [
                NOMBRE => 'incidencias',
                RUTA => '/stock/incident/index',
            ],
        ],
    ],
    [
        NOMBRE => 'financiero',
        RUTA => 'menu_financial',
        'sub' => [
            /*[
                NOMBRE => 'ingresos',
                RUTA => '/financials/income/index',
            ],
            [
                NOMBRE => 'gastos',
                RUTA => '/financials/expenses/index',
            ],*/
            [
                NOMBRE => 'finanzas',
                RUTA => '/financials/default/index',
            ],
            [
                NOMBRE => 'facturas-recibidas',
                RUTA => '/listing/list-bill-received/index',
            ],
            [
                NOMBRE => 'facturas-emitidas',
                RUTA => '/listing/list-bill-issued/index',
            ],
            [
                NOMBRE => 'rentabilidad',
                RUTA => '/stock/profitability/index',
            ],
            [
                NOMBRE => 'caja',
                RUTA => '/listing/list-clinic-cash/index',
            ],
            [
                NOMBRE => 'histórico-de-cajas',
                RUTA => '/financials/clinic-cash/index',
            ],
            [
                NOMBRE => 'ingresos-anticipados',
                RUTA => '/listing/list/anticipated-income',
            ],
            [
                NOMBRE => 'listado-Pacientes-por-trimestres',
                RUTA => '/listing/list/pacientes-trimestre',
            ],
            [
                NOMBRE => 'facturas-central',
                RUTA => '/financials/facturas-central/index',
            ],
        ],
    ],
    [
        NOMBRE => 'bi',
        RUTA => 'menu_bi',
        'sub' => [
            [
                NOMBRE => 'cuadro-de-mandos',
                RUTA => '/bi/cockpit/index',
            ],
            [
                NOMBRE => 'funnels-de-conversion',
                RUTA => '/bi/efficiency/funnel',
            ],
            [
                NOMBRE => 'funnels-de-conversion-agrupados',
                RUTA => '/bi/efficiency/funnel-splitted',
            ],
            [
                NOMBRE => 'graficas-tarta',
                RUTA => '/bi/efficiency/pie-chart',
            ],
            [
                NOMBRE => 'ranking',
                RUTA => '/bi/ranking/index',
            ],
            [
                NOMBRE => 'listados',
                RUTA => '/listing/default/index',
            ],
            [
                NOMBRE => 'sql',
                RUTA => '/bi/sql/index',
            ],
            [
                NOMBRE => 'gráficos',
                RUTA => '/bi/graphics/index',
            ],
            [
                NOMBRE => 'sesiones',
                RUTA => '/bi/bi-session/index',
            ],
        ],
    ],
    [
        NOMBRE => 'mantenimiento',
        RUTA => 'menu_maintenance',
        'sub' => [
            [
                NOMBRE => 'menú-datos-clínicas',
                RUTA => 'menu_maint_clinics',
            ],
            [
                NOMBRE => 'datos-clínicas-clínicas',
                RUTA => '/clinic/clinic/index',
            ],
            [
                NOMBRE => 'datos-clínicas-estadísticas',
                RUTA => '/marketing/clinic-statistics/index',
            ],
            [
                NOMBRE => 'menú-datos-empleados',
                RUTA => 'menu_maint_employee',
            ],
            [
                NOMBRE => 'datos-empleados-empleados',
                RUTA => '/people/employee/index',
            ],
            [
                NOMBRE => 'datos-empleados-puestos',
                RUTA => '/people/employee-type/index',
            ],
            [
                NOMBRE => 'datos-empleados-departamentos',
                RUTA => '/people/department/index',
            ],
            [
                NOMBRE => 'menú-datos-tratamientos',
                RUTA => 'menu_maint_treatments',
            ],
            [
                NOMBRE => 'datos-tratamientos-areas',
                RUTA => '/treatments/area/index',
            ],
            [
                NOMBRE => 'datos-tratamientos-tratamientos',
                RUTA => '/treatments/treatment/index',
            ],
            [
                NOMBRE => 'datos-tratamientos-estados',
                RUTA => '/historical/patient-treatment-status/index',
            ],
            [
                NOMBRE => 'datos-tratamientos-especialidades',
                RUTA => '/treatments/treatment-type/index',
            ],
            [
                NOMBRE => 'datos-tratamientos-grupos-de-tratamientos',
                RUTA => '/treatments/treatment-group/index',
            ],
            [
                NOMBRE => 'datos-tratamientos-medicamentos',
                RUTA => '/treatments/chemistry/index',
            ],
            [
                NOMBRE => 'datos-tratamientos-categorías-medicamentos',
                RUTA => '/treatments/chemistry-category/index',
            ],
            [
                NOMBRE => 'datos-tratamientos-consentimiento-informado',
                RUTA => '/maintenance/informed-consent/index',
            ],
            [
                NOMBRE => 'datos-tratamientos-pixel-tracker',
                RUTA => '/admin/default/index',
            ],
            [
                NOMBRE => 'menú-stock',
                RUTA => 'menu_maint_stock',
            ],
            [
                NOMBRE => 'stock-tipos-proveedores',
                RUTA => '/stock/provider-type/index',
            ],
            [
                NOMBRE => 'stock-formas-pago',
                RUTA => '/stock/provider-pay-type/index',
            ],
            [
                NOMBRE => 'stock-tipos-incidencia',
                RUTA => '/stock/type-incident/index',
            ],
            [
                NOMBRE => 'stock-artículos-tipos-operación',
                RUTA => '/resources/resource-operation-type/index',
            ],
            [
                NOMBRE => 'stock-artículos-unidades',
                RUTA => '/resources/resource-unit/index',
            ],
            [
                NOMBRE => 'stock-artículos-tipos',
                RUTA => '/resources/resource-type/index',
            ],
            [
                NOMBRE => 'stock-artículos-familias',
                RUTA => '/resources/resource-family/index',
            ],
            [
                NOMBRE => 'stock-artículos-ámbito',
                RUTA => '/resources/resource-scope/index',
            ],
            [
                NOMBRE => 'menú-financiero',
                RUTA => 'menu_maint_financial',
            ],
            [
                NOMBRE => 'financiero-entidades-financieras',
                RUTA => '/financials/financial-entity/index',
            ],
            [
                NOMBRE => 'financiero-categorias-costes',
                RUTA => '/financials/costs-category/index',
            ],
            [
                NOMBRE => 'financiero-formas-cobro-pago',
                RUTA => '/financials/payment-type/index',
            ],
            [
                NOMBRE => 'financiero-referencia-contable',
                RUTA => '/financials/issuing-company-clinic/index',
            ],
            [
                NOMBRE => 'financiero-sociedades-emisoras',
                RUTA => '/financials/issuing-company/index',
            ],
            [
                NOMBRE => 'menú-formularios',
                RUTA => 'menu_maint_forms',
            ],
            [
                NOMBRE => 'formularios-formularios',
                RUTA => '/documents/document/index',
            ],
            [
                NOMBRE => 'formularios-categorías',
                RUTA => '/documents/category/index',
            ],
            [
                NOMBRE => 'formularios-atributos',
                RUTA => '/documents/attribute/index',
            ],
            [
                NOMBRE => 'formularios-tipos-atributos',
                RUTA => '/documents/attribute-type/index',
            ],
            [
                NOMBRE => 'centros-externos',
                RUTA => '/treatments/place/index',
            ],
            [
                NOMBRE => 'tipos-citas',
                RUTA => '/treatments/visit-type/index',
            ],
            [
                NOMBRE => 'entidades-bancarias',
                RUTA => '/financials/bank-entity/index',
            ],
            [
                NOMBRE => 'impuestos',
                RUTA => '/financials/taxes/index',
            ],
            [
                NOMBRE => 'motivos-decuento',
                RUTA => '/documents/budget-document-discount-type/index',
            ],
            [
                NOMBRE => 'objetivos-por-periodos',
                RUTA => '/clinic/goal-period/index',
            ],
            [
                NOMBRE => 'áreas-geográficas',
                RUTA => '/maintenance/geographic-area/index',
            ],
            [
                NOMBRE => 'poblaciones',
                RUTA => '/people/city/index',
            ],
            [
                NOMBRE => 'provincias',
                RUTA => '/people/state/index',
            ],
            [
                NOMBRE => 'morfología-uterina',
                RUTA => '/maintenance/uterine-morphology-type/index',
            ],
            [
                NOMBRE => 'menú-documentación',
                RUTA => 'menu_maint_knowledge',
            ],
            [
                NOMBRE => 'documentación-documentos',
                RUTA => '/knowledge/knowledge-category/view-all',
            ],
            [
                NOMBRE => 'documentación-repositorio-archivos',
                RUTA => '/admin/repository/index',
            ],
            [
                NOMBRE => 'gestión-mailchimp',
                RUTA => '/marketing/mailchimp/index',
            ],
        ],
    ],
    [
        NOMBRE => 'central-de-compras',
        RUTA => '/shoppingcenter/shopping-center/index',
    ],
    [
        NOMBRE => 'central',
        RUTA => 'menu_maint_central',
        'sub' => [
            [
                NOMBRE => 'gestión-de-clínicas',
                RUTA => '/clinic/clinical-management/index',
            ],
            [
                NOMBRE => 'informe-de-clínicas',
                RUTA => '/listing/list/inter-clinics',
            ],
            [
                NOMBRE => 'facturación-mensual',
                RUTA => '/listing/list/inter-clinics-by-month',
            ],
            [
                NOMBRE => 'exportar-Facturación-mensual',
                RUTA => '/listing/list/export-to-excel-inter-clinics-month',
            ],
            [
                NOMBRE => 'gestión-de-calidad',
                RUTA => '/documents/document/polls',
            ],
        ],
    ],
    [
        NOMBRE => 'crm',
        RUTA => 'menu_crm',
        'sub' => [
            [
                NOMBRE => 'reuniones',
                RUTA => '/crm/meetings/index',
            ],
            [
                NOMBRE => 'tareas',
                RUTA => '/crm/tasks/index',
            ],
            [
                NOMBRE => 'plantilla-de-tareas',
                RUTA => '/crm/task-templates/index',
            ],
        ],
    ],
    [
        NOMBRE => 'permisos',
        RUTA => 'menu_permissions',
        'sub' => [
            [
                NOMBRE => 'usuarios',
                RUTA => '/admin/users/index',
            ],
            [
                NOMBRE => 'roles',
                RUTA => '/admin/auth-item-roles/index',
            ],
            [
                NOMBRE => 'configuraciones',
                RUTA => '/admin/settings/index',
            ],
        ],
    ],
    [
        NOMBRE => 'accesos-directos',
        RUTA => 'headerLinks',
        'sub' => [
            [
                NOMBRE => 'documentos',
                RUTA => '/knowledge/knowledge-category/documents',
            ],
            [
                NOMBRE => 'almacén-de-archivos',
                RUTA => '/admin/repository/index',
            ],
            [
                NOMBRE => 'tarifas',
                RUTA => '/treatments/treatment/show-prices',
            ],
            [
                NOMBRE => 'ayuda',
                RUTA => '/knowledge/default/help',
            ],
            [
                NOMBRE => 'tarifas-descripion-tratamiento',
                RUTA => '/treatments/treatment/treatment-description',
            ],
            [
                NOMBRE => 'tarifas-imprimir-tratamiento',
                RUTA => '/treatments/treatment/print-all',
            ],
            [
                NOMBRE => 'cambiar-db-clinic',
                RUTA => '/clinic/clinic/change-db-clinic',
            ],
            [
                NOMBRE => 'acceder-db-clinic-Este-va-con-el-de-antes',
                RUTA => '/clinic/clinic/access-db-clinic',
            ],
        ],
    ],
    [
        NOMBRE => 'notificaciones',
        RUTA => '/communication/notification/index',
        'sub' => [
            [
                NOMBRE => 'añadir-notificacion',
                RUTA => '/communication/notification/form-ajax',
            ],
            [
                NOMBRE => 'ver-detalle-notificaciones',
                RUTA => '/communication/notification/view-ajax',
            ],
            [
                NOMBRE => 'ver-notificacion',
                RUTA => '/communication/notification/view',
            ],
            [
                NOMBRE => 'actualizar-notificacion',
                RUTA => '/communication/notification/update',
            ],
            [
                NOMBRE => 'borrar-notificacion',
                RUTA => '/communication/notification/delete',
            ],
            [
                NOMBRE => 'confirmar-notificacion-no-funciona',
                RUTA => '/communication/notification/confirm',
            ],
            [
                NOMBRE => 'confirmar-notificaciones',
                RUTA => '/communication/notification/confirm-notification-assigned',
            ],
            [
                NOMBRE => 'archivar-notificacion',
                RUTA => '/communication/notification/change-to-archived',
            ],
        ],
    ],
    [
        NOMBRE => 'añadir-tarea',
        RUTA => '/crm/tasks/form-ajax',
        'sub' => [
            [
                NOMBRE => 'todas-tareas',
                RUTA => '/crm/tasks/form-ajax',
            ],
        ],
    ],
    [
        NOMBRE => 'menú-tickets',
        RUTA => '/crm/tickets/index',
        'sub' => [
            [
                NOMBRE => 'añadir-ticket',
                RUTA => '/crm/tickets/form-ajax',
            ],
            [
                NOMBRE => 'ver-ticket',
                RUTA => '/crm/tickets/view',
            ],
        ],
    ],
    [
        NOMBRE => 'seleccionar-clinica',
        RUTA => '/clinic/clinic/select',
    ],
    [
        NOMBRE => 'seleccionar-área',
        RUTA => '/treatments/area/select',
    ],
];
?>

<?php
    echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
        'permisos' => $permisos,
        PARENT => $parent,
        'route' => 'dashboard/dashboard/index',
        'url' => 'http://backend.minerva.lan/dashboard/index',
    ]);
?>
