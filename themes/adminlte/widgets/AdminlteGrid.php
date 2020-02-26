<?php
namespace themes\adminlte\widgets;

use Yii;

/**
 * Grid
 *
 * @author Ramón Menor <ramonmenor@gmail.com>
 */
class AdminlteGrid extends \yii\bootstrap\Widget
{
    public $options;
    public $dataProvider, $searchModel;
    public $columns;
    public $pagination;

    public function init()
    {
        parent::init();

        echo $this->render('grid', [
            'searchModel' => $this->searchModel,
            'dataProvider' => $this->dataProvider,
            'options' => $this->options,
            'columns' => $this->columns,
            'pager' => $this->options['pager'],
            'pagination' => $this->pagination
        ]);
    }
}
