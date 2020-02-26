<?php
use yii\bootstrap\Tabs;

const NOMBRE = 'nombre';
const RUTA = 'ruta';
const LABEL = 'label';
const PARENT = 'parent';
const RESULT = 'result';
const CONTENT = 'content';
const ITEMS = 'items';
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'permissionTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Inicio',
            CONTENT => Yii::$app->view->render('inicio/_index', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Agenda',
            ITEMS => [
                [
                    LABEL => 'Calendario',
                    CONTENT => Yii::$app->view->render('agenda/_schedule', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Listado de citas',
                    CONTENT => Yii::$app->view->render('agenda/_event', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
            ],
        ],
        [
            LABEL => 'Solicitudes',
            CONTENT => Yii::$app->view->render('solicitudes/_index', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Pacientes',
            ITEMS => [
                [
                    LABEL => 'Listado de pacientes',
                    CONTENT => Yii::$app->view->render('pacientes/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Ver paciente',
                    CONTENT => Yii::$app->view->render('pacientes/_view', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Ver solicitud del paciente',
                    CONTENT => Yii::$app->view->render('pacientes/_patient-lead', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Ver cita del paciente',
                    CONTENT => Yii::$app->view->render('pacientes/_patient-visit', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Ver tratamiento del paciente',
                    CONTENT => Yii::$app->view->render('pacientes/_patient-treatment', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
            ],
        ],
        [
            LABEL => 'Calidad',
            ITEMS => [
                [
                    LABEL => 'Encuestas',
                    CONTENT => Yii::$app->view->render('calidad/_encuestas', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Informes de llamadas',
                    CONTENT => Yii::$app->view->render('calidad/_informe_llamadas', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
            ],
        ],
        [
            LABEL => 'Call center',
            ITEMS => [
                [
                    LABEL => 'Llamadas',
                    CONTENT => Yii::$app->view->render('call-center/_llamadas', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
            ],
        ],
        [
            LABEL => 'Marketing',
            ITEMS => [
                [
                    LABEL => 'Solicitudes online',
                    CONTENT => Yii::$app->view->render('marketing/solicitudes-online/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Canales',
                    CONTENT => Yii::$app->view->render('marketing/channel/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Origenes',
                    CONTENT => Yii::$app->view->render('marketing/origin/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Campañas',
                    CONTENT => Yii::$app->view->render('marketing/marketing-campaign/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Anuncios',
                    CONTENT => Yii::$app->view->render('marketing/marketing-ad/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Formularios de landing',
                    CONTENT => Yii::$app->view->render('marketing/landingpage/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Comunicaciones',
                    CONTENT => Yii::$app->view->render('marketing/communication/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Acortador URL',
                    CONTENT => Yii::$app->view->render('marketing/short-url/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Reviews',
                    CONTENT => Yii::$app->view->render('marketing/reviews/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Motivos de consulta',
                    CONTENT => Yii::$app->view->render('marketing/consultation-reason/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Grupos motivos de consulta',
                    CONTENT => Yii::$app->view->render('marketing/consultation-reason-group/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
            ],
        ],
        [
            LABEL => 'Comercial',
            ITEMS => [
                [
                    LABEL => 'Plan de ventas',
                    CONTENT => Yii::$app->view->render('comercial/_sales-plan', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Parrilla',
                    CONTENT => Yii::$app->view->render('comercial/_grid', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Proyección',
                    CONTENT => Yii::$app->view->render('comercial/_projection', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Hoja de datos',
                    CONTENT => Yii::$app->view->render('comercial/_data-sheet', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Objetivos de la clínica',
                    CONTENT => Yii::$app->view->render('comercial/_clinic-goal', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Control de visitas',
                    CONTENT => Yii::$app->view->render('comercial/_control-visit', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
            ],
        ],
        [
            LABEL => 'Stock',
            ITEMS => [
                [
                    LABEL => 'Proveedores',
                    CONTENT => Yii::$app->view->render('stock/provider/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Artículos',
                    CONTENT => Yii::$app->view->render('stock/resource/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Compras',
                    CONTENT => Yii::$app->view->render('stock/order/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Incidencias',
                    CONTENT => Yii::$app->view->render('stock/incident/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
            ],
        ],
        [
            LABEL => 'Financiero',
            ITEMS => [
                [
                    LABEL => 'Finanzas',
                    CONTENT => Yii::$app->view->render('financiero/finanzas/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Facturas recibidas',
                    CONTENT => Yii::$app->view->render('financiero/bill/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Facturas emitidas',
                    CONTENT => Yii::$app->view->render('financiero/charge/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Rentabilidad',
                    CONTENT => Yii::$app->view->render('financiero/profitability/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Caja',
                    CONTENT => Yii::$app->view->render('financiero/list-clinic-cash/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'Histórico de caja',
                    CONTENT => Yii::$app->view->render('financiero/clinic-cash/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Facturas de central',
                    CONTENT => Yii::$app->view->render('financiero/facturas-central/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
            ],
        ],
        [
            LABEL => 'Bi',
            ITEMS => [
                [
                    LABEL => 'Cuadro de mandos',
                    CONTENT => Yii::$app->view->render('bi/_cockpit', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Funnel',
                    CONTENT => Yii::$app->view->render('bi/_funnel', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Ranking',
                    CONTENT => Yii::$app->view->render('bi/_ranking', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Listados',
                    CONTENT => Yii::$app->view->render('bi/_listing', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                    'active' => false,
                ],
                [
                    LABEL => 'SQL',
                    CONTENT => Yii::$app->view->render('bi/_sql', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Gráficos',
                    CONTENT => Yii::$app->view->render('bi/_graphics', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
            ],
        ],
        [
            LABEL => 'Perfil',
            ITEMS => [
                [
                    LABEL => 'Empleado',
                    CONTENT => Yii::$app->view->render('employee/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Clínica',
                    CONTENT => Yii::$app->view->render('clinic/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Empleado Clínica',
                    CONTENT => Yii::$app->view->render('clinic-employee/_index', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
            ],
        ],
        [
            LABEL => 'Mantenimiento',
            ITEMS => [
                [
                    LABEL => 'Datos de Clínicas - Clínicas',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-clinicas/_clinicas', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Clínicas - Estadísticas',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-clinicas/_estadisticas', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Empleados - Empleados',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-empleados/_empleados', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Empleados - Puestos',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-empleados/_puestos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Empleados - Departamentos',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-empleados/_departamentos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Tratamientos - Areas',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-tratamientos/_areas', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Tratamientos - Tratamientos',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-tratamientos/_tratamientos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Tratamientos - Estados',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-tratamientos/_estados', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Tratamientos - Especialidades',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-tratamientos/_especialidades', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Tratamientos - Grupos de tratamientos',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-tratamientos/_grupos_tratamientos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Tratamientos - Medicamentos',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-tratamientos/_medicamentos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Tratamientos - Categorias Medicamentos',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-tratamientos/_categorias_medicamentos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Tratamientos - Consentimiento informado',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-tratamientos/_consentimiento_informado', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Datos de Tratamientos - Pixel Tracker',
                    CONTENT => Yii::$app->view->render('mantenimiento/datos-de-tratamientos/_pixel_tracker', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Stock - Tipo de proveedores',
                    CONTENT => Yii::$app->view->render('mantenimiento/stock/_tipos_proveedores', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Stock - Formas de pago',
                    CONTENT => Yii::$app->view->render('mantenimiento/stock/_formas_pago', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Stock - Tipos de incidencias',
                    CONTENT => Yii::$app->view->render('mantenimiento/stock/_tipos_incidencias', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Stock - Artículos - Tipos de operación',
                    CONTENT => Yii::$app->view->render('mantenimiento/stock/_articulos_tipos_de_operacion', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Stock - Artículos - Unidades',
                    CONTENT => Yii::$app->view->render('mantenimiento/stock/_articulos_unidades', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Stock - Artículos - Tipos',
                    CONTENT => Yii::$app->view->render('mantenimiento/stock/_articulos_tipos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Stock - Artículos - Familias',
                    CONTENT => Yii::$app->view->render('mantenimiento/stock/_articulos_familias', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Stock - Artículos - Ámbito',
                    CONTENT => Yii::$app->view->render('mantenimiento/stock/_articulos_ambito', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Financiero - Entidades financieras',
                    CONTENT => Yii::$app->view->render('mantenimiento/financiero/_entidades_financieras', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Financiero - Categorias de costes',
                    CONTENT => Yii::$app->view->render('mantenimiento/financiero/_categorias_costes', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Financiero - Formas de cobro/pago',
                    CONTENT => Yii::$app->view->render('mantenimiento/financiero/_formas_cobro_pago', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Financiero - Referencia contable',
                    CONTENT => Yii::$app->view->render('mantenimiento/financiero/_referencia_contable', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Financiero - Sociedades emisoras',
                    CONTENT => Yii::$app->view->render('mantenimiento/financiero/_sociedades_emisoras', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Formularios - Formularios',
                    CONTENT => Yii::$app->view->render('mantenimiento/formularios/_formularios', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Formularios - Categorías',
                    CONTENT => Yii::$app->view->render('mantenimiento/formularios/_categorias', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Formularios - Atributos',
                    CONTENT => Yii::$app->view->render('mantenimiento/formularios/_atributos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Formularios - Tipos de atributos',
                    CONTENT => Yii::$app->view->render('mantenimiento/formularios/_tipos_atributos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Centros externos',
                    CONTENT => Yii::$app->view->render('mantenimiento/_centros_externos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Tipos de citas',
                    CONTENT => Yii::$app->view->render('mantenimiento/_tipos_citas', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Entidades bancarias',
                    CONTENT => Yii::$app->view->render('mantenimiento/_entidades_bancarias', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Impuestos',
                    CONTENT => Yii::$app->view->render('mantenimiento/_impuestos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Motivos de descuento',
                    CONTENT => Yii::$app->view->render('mantenimiento/_motivos_descuento', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Objetivos por periodos',
                    CONTENT => Yii::$app->view->render('mantenimiento/_objetivos_periodos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Áreas geográficas',
                    CONTENT => Yii::$app->view->render('mantenimiento/_areas_geograficas', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Poblaciones',
                    CONTENT => Yii::$app->view->render('mantenimiento/_poblaciones', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Provincias',
                    CONTENT => Yii::$app->view->render('mantenimiento/_provincias', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Morfología uterina',
                    CONTENT => Yii::$app->view->render('mantenimiento/_morfologia_uterina', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Documentación - Documentos',
                    CONTENT => Yii::$app->view->render('mantenimiento/documentacion/_documentos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Documentación - Repositorio de archivos',
                    CONTENT => Yii::$app->view->render('mantenimiento/documentacion/_repositorio_archivos', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Gestión Mailchimp',
                    CONTENT => Yii::$app->view->render('mantenimiento/_gestion_mailchimp', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
            ],
        ],
        [
            LABEL => 'Central de compras',
            CONTENT => Yii::$app->view->render('central-de-compras/_index', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Central',
            ITEMS => [
                [
                    LABEL => 'Gestión de clínicas',
                    CONTENT => Yii::$app->view->render('central/_gestion_clinicas', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Informe de clínicas',
                    CONTENT => Yii::$app->view->render('central/_informe_clinicas', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Gestión de clínicas',
                    CONTENT => Yii::$app->view->render('central/_gestion_calidad', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
            ],
        ],
        [
            LABEL => 'CRM',
            ITEMS => [
                [
                    LABEL => 'Reuniones',
                    CONTENT => Yii::$app->view->render('crm/_reuniones', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Tareas',
                    CONTENT => Yii::$app->view->render('crm/_tareas', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Plantillas de tareas',
                    CONTENT => Yii::$app->view->render('crm/_plantillas_tareas', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
            ],
        ],
        [
            LABEL => 'Permisos',
            ITEMS => [
                [
                    LABEL => 'Usuarios',
                    CONTENT => Yii::$app->view->render('permisos/_usuarios', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Roles',
                    CONTENT => Yii::$app->view->render('permisos/_roles', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
                [
                    LABEL => 'Configuraciones',
                    CONTENT => Yii::$app->view->render('permisos/_configuraciones', [
                        PARENT => $parent,
                        RESULT => $result
                    ]),
                ],
            ],
        ],
],
]) ?>