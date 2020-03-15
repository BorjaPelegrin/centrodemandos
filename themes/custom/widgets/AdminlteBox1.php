<?php
namespace themes\custom\widgets;

use Yii;

/**
 * Box
 *
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
