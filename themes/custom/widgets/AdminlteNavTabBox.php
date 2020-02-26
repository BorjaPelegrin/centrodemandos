<?php
namespace themes\adminlte\widgets;

use Yii;

/**
 * Nav Tab Box
 *
 *
 * @author Ramón Menor <ramonmenor@gmail.com>
 */
class AdminlteNavTabBox extends \yii\bootstrap\Widget
{
    public $items;
    public $buttons;

    public function init()
    {
        parent::init();

        echo $this->render('nav_tabs_box', [
            'items' => $this->items,
            'buttons' => $this->buttons,
        ]);
    }
}