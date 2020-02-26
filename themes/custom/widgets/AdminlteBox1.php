<?php
namespace themes\adminlte\widgets;

use Yii;

/**
 * Box
 *
 *
 * @author Ramón Menor <ramonmenor@gmail.com>
 */
class AdminlteBox1 extends \yii\bootstrap\Widget
{
    public $options;

    public function init()
    {
        parent::init();

        echo $this->render('box1', [
            'options' => $this->options
        ]);
    }
}
