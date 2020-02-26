<?php
namespace themes\adminlte\widgets;

use Yii;

/**
 * List
 *
 * @author Ramón Menor <ramonmenor@gmail.com>
 */
class AdminlteList extends \yii\bootstrap\Widget
{
    public $options;
    public $dataProvider;

    public function init()
    {
        parent::init();

        echo $this->render('list', [
            'dataProvider' => $this->dataProvider,
            'options' => $this->options,
            'pager' => $this->options['pager'],
        ]);
    }
}
