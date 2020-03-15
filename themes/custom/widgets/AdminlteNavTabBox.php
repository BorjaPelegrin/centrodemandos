<?php
namespace themes\custom\widgets;

use Yii;

/**
 * Nav Tab Box
 *
 *
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