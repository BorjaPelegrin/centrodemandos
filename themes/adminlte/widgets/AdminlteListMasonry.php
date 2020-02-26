<?php
namespace themes\adminlte\widgets;

use Yii;
use yii\base\Widget;

/**
 * List
 *
 * @author Ramón Menor <ramonmenor@gmail.com>
 */
class AdminlteListMasonry extends Widget
{
    public $options;
    public $dataProvider;

    public function init()
    {
        parent::init();

        echo $this->render('list_masonry', [
            'dataProvider' => $this->dataProvider,
            'options' => $this->options,
            'pager' => $this->options['pager'],
        ]);
    }
}
