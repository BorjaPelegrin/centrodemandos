<?php
namespace themes\adminlte\widgets;

use Yii;

/**
 * Box
 *
 *
 * @author Ramón Menor <ramonmenor@gmail.com>
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