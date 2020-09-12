<?php
/**
 * Use
 *
$media = new Media();
$media->associated_tb = Media::TABLE_EMPLOYEE;
$media->associated_id = $model->id_employee;

<?= \common\modules\media\components\FileManagerWidget::widget([
    'model' => $media,
]) ?>
 *
 */

namespace common\modules\media\components;

use yii\base\Widget;

class FileManagerWidget extends Widget
{
    public $id;
    public $model;
    public $searchModel;
    public $notadd;
    public $closed;

    public function init()
    {
        parent::init();

        if (!$this->searchModel)
            $this->searchModel = new \common\modules\media\searchs\MediaSearch();
    }

    /**
     * @return string
     */
    public function run()
    {
        return $this->render('@common/modules/media/views/media/widget/filemanager', [
            'id' => $this->id,
            'model' => $this->model,
            'searchModel' => $this->searchModel,
            'notadd' => $this->notadd,
            'closed' => $this->closed,
        ]);
    }
}
?>