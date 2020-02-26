<?php

use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'añadir-actualizar-sesión-tratamiento',
        RUTA => '/treatments/treatment-visit-type/form-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-sesión-tratamiento',
                RUTA => '/treatments/treatment-visit-type/view',
            ],
            [
                NOMBRE => 'borrar-sesión-tratamiento',
                RUTA => '/treatments/treatment-visit-type/delete',
            ],
            [
                NOMBRE => 'activar-desactivar-sesión-tratamiento',
                RUTA => '/treatments/treatment-visit-type/change-to-archived',
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
<strong>Las pestañas de la sesión no tienen permisos</strong>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'treatmentVisitTypePermissionTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Recusos a utilizar',
            CONTENT => Yii::$app->view->render('treatment-visit-type-resources', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Formularios',
            CONTENT => Yii::$app->view->render('treatment-visit-type-formularios', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Archivos',
            CONTENT => Yii::$app->view->render('treatment-visit-type-media', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
    ],
]) ?>

