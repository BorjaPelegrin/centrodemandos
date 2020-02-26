<?php

namespace common\modules\dashboard;

use Yii;

/**
 * dashboard module definition class
 */
class Module extends \yii\base\Module
{
    public $name = 'Inicio';
    public $defaultController = 'dashboard';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\dashboard\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function menu($controller_id = null)
    {
        $items = [
            /*[
                'label'=>'<i class="fa fa-calendar"></i> <span>Agenda</span>',
                'url'=>['/calendar/event/schedule'],
                'active'=>$controller_id == 'event' ? true:false,
                'visible'=>Yii::$app->admin->checkPermission('/calendar/event/basic-schedule'),
            ],
            [
                'label'=>'<i class="fa fa-inbox"></i> <span>Solicitudes</span>',
                'url'=>['/people/lead/index'],
                'active'=>$controller_id == 'lead' ? true:false,
                'visible'=>Yii::$app->admin->checkPermission('/people/lead/index'),
            ],
            [
                'label'=>'<i class="fa fa-users"></i> <span>Pacientes</span>',
                'url'=>['/people/patient/create-with-lead'],
                'active'=>$controller_id == 'patient' || $controller_id == 'patient-treatment' || $controller_id == 'patient-visit' ? true:false,
                'visible'=>Yii::$app->admin->checkPermission('/people/patient/create-with-lead'),
            ],*/
            // SI
            /*[
                'label'=>'<i class="fa fa-bars"></i> <span>SI</span>',
                'url'=>'#',
                'template' => '<a href="{url}" >{label}<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                'options'=>['class'=>'treeview'],
                'items' => [
                    [
                        'label'=>'<i class="fa fa-bars"></i> <span> Datos SID Interclínicas</span>',
                        'url'=>'#',
                        'template' => '<a href="{url}" >{label}<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                        'options'=>['class'=>'treeview'],
                        'items' => [
                            [
                                'label'=>'<i class="fa fa-bars"></i> Listado',
                                'url'=>['/agenda/inter-clinic/index'],
                                'active'=>$controller_id == 'inter-clinic' ? true:false,
                                'visible'=>false,
                            ],
                            [
                                'label'=>'<i class="fa fa-bars"></i> Error acceso a clínica',
                                'url'=>['/agenda/clinic-failed/index'],
                                'active'=>$controller_id == 'clinic-failed' ? true:false,
                                'visible'=>false,
                            ],
                            [
                                'label'=>'<i class="fa fa-bars"></i> Importador',
                                'url'=>['/agenda/inter-clinic/clinic-missing'],
                                'active'=>$controller_id == 'inter-clinic' ? true:false,
                                'visible'=>false,
                            ],
                        ],
                        'visible'=>false,
                    ],
                ],
                'visible'=>false,
            ],*/
            // MAINTENANCE
            [
                'label'=>'<i class="fa fa-bars"></i> <span>Mantenimiento</span>',
                'url'=>'#',
                'template' => '<a href="{url}" >{label}<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                'options'=>['class'=>'treeview'],
                'items' => [
                    [
                        'label'=>'<i class="fa fa-bars"></i> Tipos',
                        'url'=>['/maintenance/tipo/index'],
                        'active'=>$controller_id == 'ejercicio' ? true:false,
                        'visible'=>true,
                    ],
                    [
                        'label'=>'<i class="fa fa-bars"></i> Zonas',
                        'url'=>['/maintenance/zona/index'],
                        'active'=>$controller_id == 'clinic-failed' ? true:false,
                        'visible'=>true,
                    ],
                    [
                        'label'=>'<i class="fa fa-bars"></i> Ejercicios',
                        'url'=>['/maintenance/ejercicio/index'],
                        'active'=>$controller_id == 'inter-clinic' ? true:false,
                        'visible'=>true,
                    ],
                ],
                'visible'=>true,
            ],
        ];

        return $items;
    }
}
