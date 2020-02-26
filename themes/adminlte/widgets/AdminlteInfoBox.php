<?php
namespace themes\adminlte\widgets;

use Yii;

/**
 * Info Box
 *
 *
 * @author Ramón Menor <ramonmenor@gmail.com>
 */
class AdminlteInfoBox extends \yii\bootstrap\Widget
{
    public $content;
    public $options;

    public function init()
    {
        parent::init();

        echo $this->render('info_box', [
            'content' => $this->content,
            'options' => $this->options,
        ]);
    }
}
