<?php

use common\classes\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

?>
<div class="patient-index">

    <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pager' => [
                'prevPageLabel' => '<i class="fa fa-chevron-left"></i>',   // Set the label for the "previous" page button
                'nextPageLabel' => '<i class="fa fa-chevron-right"></i>',   // Set the label for the "next" page button
                'firstPageLabel'=>'<i class="fa fa-step-backward"></i>',   // Set the label for the "first" page button
                'lastPageLabel'=>'<i class="fa fa-step-forward"></i>',    // Set the label for the "last" page button
                'maxButtonCount'=>10,    // Set maximum number of page buttons that can be displayed
            ],
            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],

                /*[
                    'label' => 'Id',
                    'attribute' => 'id_patient',
                    'headerOptions' => ['style'=>'width:25px;'],
                    'contentOptions' => ['style'=>'width:25px;'],
                ],*/
                // 'id_patient_from',
                // 'id_employee_from',
                // 'id_coming_from',
                // 'id_consultation_reason',
                // 'id_user',
                // 'id_language',
                // 'is_coming_from_other_clinic_employee',
                // 'is_coming_from_central_employee',
                [
                    //'attribute' => 'name',
                    'format' => 'html',
                    'label' => 'Nombre',
                    'value' => function ($model) {
                        return $model->fullName ? Html::a($model->fullName, ['/people/patient/view', 'id'=>$model->id_patient], ['class' => '']) : 'No disponible';
                    },
                ],
                // 'name',
                // 'surname1',
                // 'surname2',
                'dni_cif',
                // 'email:email',
                [
                    'label' => 'Género',
                    'value' => function ($model) {
                        return $model->idGender ? $model->idGender->description : 'No disponible';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'id_gender', ArrayHelper::map(\common\modules\people\models\Gender::find()->asArray()->all(), 'id_gender', 'description'),['class'=>'form-control','prompt' => 'Todas los géneros']),
                ],
                'date_birth',
                // 'date_creation',
                // 'date_update',
                // 'date_delete',
                // 'id_marital_status',
                // 'num_childs',
                [
                    'attribute' => 'status',
                    'label' => 'Activo?',
                    'value' => function ($model) {
                        return $model->status ? 'Si' : 'No';
                    },
                    'filter' => [1=>'Si',0=>'No']
                ],
                // 'id_old_patient',
                // 'id_old_clinic',
                // 'is_confidential',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'headerOptions' => ['style'=>'width:75px;'],
                    'contentOptions' => ['style'=>'text-align:center;width:75px;'],
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>

</div>
