<?php
namespace themes\adminlte\widgets;

use Yii;

/**
 * InfoBox
 *
 *
 * @author Ramón Menor <ramonmenor@gmail.com>
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
