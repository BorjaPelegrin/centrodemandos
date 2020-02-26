<?php
$permisos =[
    [
        NOMBRE => 'escribir-datos-objetivos-de-la-clínica',
        RUTA => '/bi/clinic-goal/update-input',
        'sub' => [
            [
                NOMBRE => 'escribir-objetivos-de-la-clínica',
                RUTA => '/bi/clinic-goal/update-clinic-goal',
            ]
        ]
    ],
];
?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'bi/data-sheet/view',
    'url' => 'http://backend.minerva.lan/bi/data-sheet/view',
]);
?>