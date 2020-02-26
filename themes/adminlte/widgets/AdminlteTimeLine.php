<?php
namespace themes\adminlte\widgets;

use Yii;

/**
 * Time line
 *
 * @author Ramón Menor <ramonmenor@gmail.com>
 */
class AdminlteTimeLine extends \yii\bootstrap\Widget
{
    public $options;
    public $dataProvider, $searchModel;
    public $columns;

    public function init()
    {
        parent::init();

        echo $this->render('time_line', [
            'searchModel' => $this->searchModel,
            'dataProvider' => $this->dataProvider,
            'options' => $this->options,
        ]);
    }
}
