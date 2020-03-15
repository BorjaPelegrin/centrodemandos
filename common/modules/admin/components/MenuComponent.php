<?php

namespace common\modules\admin\components;

use Yii;
use yii\base\Component;

class MenuComponent extends Component
{
    public function mainMenu ()
    {
        $menu = [
            [
                'name' => 'Configuración',
                'icon' => 'widgets',
                'active' => [
                    'users'
                ],
                'items' => [
                    [
                        'name' => 'Usuarios',
                        'link' => '/admin/users',
                        'active' => ['users']
                    ],
                ],
            ],
        ];

        return $menu;
    }

    /**
     * Devuelve un menú configurado en el módulo, si no contiene el método se devuelve el menú configurado en el módulo de admin
     * @param string $module_active
     * @param $controller_id
     * @return array|null
     */
    public function menuModules($module_active='admin',$controller_id, $action_id)
    {
        $menu = null;

        if (Yii::$app->getModule($module_active) != null) {
            $module = Yii::$app->getModule($module_active);

            if (method_exists($module,'menu')) {
                if (isset(Yii::$app->controller->actionParams['tipo'])) {
                    $menu[] = $module->menu($controller_id, Yii::$app->controller->actionParams['tipo']);
                } else {
                    $menu[] = $module->menu($controller_id);
                }
            } else {
                // Por defecto
                $module = Yii::$app->getModule('dashboard');
                $menu[] = $module->menu($controller_id, $action_id);
            }
        }

        return $menu;
    }
}
