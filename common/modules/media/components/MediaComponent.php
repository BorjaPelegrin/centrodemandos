<?php

namespace common\modules\media\components;

use Yii;
use yii\base\Component;
use yii\imagine\Image;
use yii\web\UploadedFile;
use Imagine\Image\ImageInterface;

use common\modules\media\models\Media;

class MediaComponent extends Component
{
    /**
     * @param $model Media
     * @param $file UploadedFile
     * @return bool
     */
    public function saveFile($model,$file)
    {
        $errors = '';

        if ($file) {
            $uid = uniqid(time(), true);
            $directory = \Yii::getAlias('@backend/web/media/'.$model->associated_tb.'/'.$model->associated_id.'/');

            if (!is_dir($directory))
                mkdir($directory,0755,true);

            $finalPath = $directory . $uid . '.' . $file->extension;

            $model->source = '/media/'.$model->associated_tb.'/'.$model->associated_id.'/' . $uid . '.' . $file->extension;
            $model->archived = 0;
            $model->setMimeType($file->tempName);
            $transaction = \Yii::$app->db->beginTransaction();
            if ($file->saveAs($finalPath)) {
                if ($model->save()) {
                    $transaction->commit();
                }
            } else {
                $errors .= 'No se ha podido guardar el archivo.<br>';
                $transaction->rollBack();
                return false;
            }
        } else {
            $errors .= 'No se ha recibido ningún archivo.';
            return false;
        }

        return true;
    }

    /**
     * @param $files UploadedFile
     * @param $associated_tb string
     * @param $associated_id integer
     * @return bool
     */
    public function uploadFiles($files, $associated_tb, $associated_id, $id_media_type=null)
    {
        foreach ($files AS $file) {
            $model = new Media();
            $uid = uniqid(time(), true);
            $idClinic = \Yii::$app->user->identity->db_clinic;

            $directory = \Yii::getAlias('@backend/web/media/'. $associated_tb . '/' . $associated_id . '/');

            if (!is_dir($directory))
                mkdir($directory,0755,true);

            $finalPath = $directory . $uid . '.' . $file->extension;

            $model->source = $finalPath;
            $model->id_clinic = $idClinic;
            $model->archived = 0;
            $model->name = $file->name;
            $model->associated_id = $associated_id;
            $model->associated_tb = $associated_tb;
            $model->id_media_type = $id_media_type ? $id_media_type : 2;
            $model->setMimeType($file->tempName);
            $transaction = \Yii::$app->db->beginTransaction();

            if ($model->save()) {
                if ($model->idMimeType->category == 'image') {
                    $image = $this->resizeImage($file);
                    // Opciones de resolución
                    $options = array(
                        'resolution-units' => ImageInterface::RESOLUTION_PIXELSPERINCH,
                        'resolution-x' => 75,
                        'resolution-y' => 75,
                        'resampling-filter' => ImageInterface::FILTER_LANCZOS,
                    );
                    $image->save($finalPath,$options);
                    $transaction->commit();
                } else {
                    if ($file->saveAs($finalPath)) {
                        $transaction->commit();
                    } else {
                        //$errors .= 'No se ha podido guardar el archivo.<br>';
                        $transaction->rollBack();
                    }
                }
            } else {
                $transaction->rollBack();
                //foreach ($model->errors as $error)
                    //$errors .= $error[0] . "<br>";
            }
        }

        if($model->associated_tb == 'report_online'){
            return $model;
        }else {
            return true;
        }
    }

    /**
     * @param $file
     * @return ImageInterface
     */
    public function resizeImage($file)
    {
        $image = Image::resize($file->tempName, 1600, 1600);
        return $image;
    }
}