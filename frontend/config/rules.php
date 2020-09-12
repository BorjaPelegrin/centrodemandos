<?php

return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        // Pruebas de funcionamiento

        'files' => '/admin/repository/connector',

        'dashboard/<action:\w+>' => 'dashboard/dashboard/<action>',

        /*'calendar/<id:\d+>/<action:\w+>' => 'calendar/event/<action>',
        'calendar/<action:\w+>' => 'calendar/event/<action>',

        'clinic/<id:\d+>/<action:\w+>' => 'clinic/clinic/<action>',
        'clinic/<action:\w+>' => 'clinic/clinic/<action>',

        'employee/<id:\d+>/<action:\w+>' => 'people/employee/<action>',
        'employee/<action:\w+>' => 'people/employee/<action>',

        'lead/<id:\d+>/<action:\w+>' => 'people/lead/<action>',
        'lead/<action:\w+>' => 'people/lead/<action>',

        'marketing/campaign/<id:\d+>/<action:\w+>' => 'marketing/marketing-campaign/<action>',
        'marketing/campaign/<action:\w+>' => 'marketing/marketing-campaign/<action>',
        'marketing/ad/<id:\d+>/<action:\w+>' => 'marketing/marketing-ad/<action>',
        'marketing/ad/<action:\w+>' => 'marketing/marketing-ad/<action>',
        'marketing/ad/content/<id:\d+>/<action:\w+>' => 'marketing/marketing-ad-content/<action>',
        'marketing/ad/content/<action:\w+>' => 'marketing/marketing-ad-content/<action>',

        'patient/<id:\d+>/<action:\w+>' => 'people/patient/<action>',
        'patient/<action:\w+>' => 'people/patient/<action>',

        'patient/treatment/<id:\d+>/<action:\w+>' => 'historical/patient-treatment/<action>',
        'patient/treatment/<action:\w+>' => 'historical/patient-treatment/<action>',

        'patient/visit/<id:\d+>/<action:\w+>' => 'historical/patient-visit/<action>',
        'patient/visit/<action:\w+>' => 'historical/patient-visit/<action>',

        'financials/bill/<id:\d+>/<action:\w+>' => 'billing/bill/<action>',
        'financials/bill/<action:\w+>' => 'billing/bill/<action>',
        'financials/income/<id:\d+>/<action:\w+>' => 'financials/income/<action>',
        'financials/income/<action:\w+>' => 'financials/income/<action>',
        'financials/expenses/<id:\d+>/<action:\w+>' => 'financials/expenses/<action>',
        'financials/expenses/<action:\w+>' => 'financials/expenses/<action>',
        'financials/cash/<id:\d+>/<action:\w+>' => 'financials/cash/<action>',
        'financials/cash/<action:\w+>' => 'financials/cash/<action>',

        'bi/sessions/<id:\d+>/<action:\w+>' => 'bi/bi-session/<action>',
        'bi/sessions/<action:\w+>' => 'bi/bi-session/<action>',

        'listing/cash/<id:\d+>/<action:\w+>' => 'listing/list-clinic-cash/<action>',
        'listing/cash/<action:\w+>' => 'listing/list-clinic-cash/<action>',

        'callcenter/calls/<id:\d+>/<action:\w+>' => 'callcenter/callcenter-calls/<action>',
        'callcenter/calls/<action:\w+>' => 'callcenter/callcenter-calls/<action>',
        'callcenter/types-call/<id:\d+>/<action:\w+>' => 'callcenter/callcenter-types-call/<action>',
        'callcenter/types-call/<action:\w+>' => 'callcenter/callcenter-types-call/<action>',
        'callcenter/channels/<id:\d+>/<action:\w+>' => 'callcenter/callcenter-channels/<action>',
        'callcenter/channels/<action:\w+>' => 'callcenter/callcenter-channels/<action>',*/

        // Generic rules
        'login' => '/site/login',
        'maintenance' => '/site/maintenance',
        'register' => '/site/register',
        'signup' => '/site/signup',
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        '<module:\w+>/<controller:\w+>/<id:\d+>/<action:\w+>' => '<module>/<controller>/<action>',
        'defaultRoute' => '/site/index',
    ],
];
