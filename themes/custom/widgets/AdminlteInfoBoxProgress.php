<?php
namespace themes\custom\widgets;

use Yii;

/**
 * InfoBox
 *
 *
 */
class AdminlteInfoBoxProgress extends \yii\bootstrap\Widget
{
    public $options;

    public function init()
    {
        parent::init();

        echo $this->render('info_box_progress', [
            'options' => $this->options
        ]);
    }
}
