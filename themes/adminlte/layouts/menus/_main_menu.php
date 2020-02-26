<?php

use common\classes\Html;

?>

<?php
if (!Yii::$app->user->isGuest) {
    $items = [
        [
            'label'=>'<i class="fa fa-dashboard"></i> <span>Inicio</span>',
            'url'=>\yii\helpers\Url::to(['/dashboard/index']),
            'options' => [],
            'active'=> $this->context->module->id == 'dashboard',
        ]
    ];

    if (isset($this->context->module->id)) {
        $menus = Yii::$app->menu->menuModules($this->context->module->id,$this->context->id);
    }
    if ($menus != null) {
        if (isset ($menus[0])) {
            foreach ($menus[0] as $item) {
                $items[] = $item;
            }
        }
    }

    // Menú de la aplicación
    echo \yii\widgets\Menu::widget(
        [
            'options' => ['class' => 'sidebar-menu', 'data-widget' => "tree"],
            'items' => $items,
            'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
            'encodeLabels' => false, //allows you to use html in labels
            'activateParents' => true,
        ]
    );
}
?>