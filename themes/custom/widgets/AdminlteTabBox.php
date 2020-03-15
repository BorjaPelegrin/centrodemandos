<?php
namespace themes\custom\widgets;

use Yii;

/**
 * Box
 *
 *
 */
class AdminlteTabBox extends \yii\bootstrap\Widget
{
    public $items;

    public function init()
    {
        parent::init();

        echo $this->render('tab_box', [
            'items' => $items
        ]);
    }
}