<?php
use common\classes\Html;
use common\modules\admin\models\UserLogin;
use common\modules\admin\models\Users;
use common\modules\people\models\Employee;

$buttons = [
    'view' => function ($url, $model) {
        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
            'class' => 'btn btn-primary btn-xs',
            'data-toggle' => 'tooltip',
            'title' => 'Ver',
            'data-pjax' => '0'
        ]);
    },
    'update' => function ($url, $model) {
        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
            'class' => 'btn btn-info btn-xs',
            'data-toggle' => 'tooltip',
            'title' => 'Actualizar',
            'method' => 'post'
        ]);
    },
    'delete' => function ($url, $model) {
        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
            'class' => 'btn btn-danger btn-xs',
            'data-toggle' => 'tooltip',
            'title' => 'Borrar',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
    },
    'select' => function ($url, $model) {
        $class = 'btn btn-xs ';
        return Html::a($model->status == Users::STATUS_ACTIVE ? '<span class="glyphicon glyphicon-check"></span>' : '<span class="glyphicon glyphicon-unchecked"></span>', ['/admin/users/deactive', 'id' => $model->id], [
            'class' => $model->status == Users::STATUS_ACTIVE ? $class.'bg-olive' : $class.'bg-orange',
            'data-toggle' => 'tooltip',
            'title' => 'Activar/desactivar',
            'data' => [
                'method' => 'post',
            ],
        ]);
    },
];

$columns = [
    // ['class' => 'yii\grid\SerialColumn'],

    //'id',
    [
        'attribute' => 'username',
        'format' => 'raw',
        'value' => function ($model) {
            return Html::encode($model->username);
        },
        'headerOptions' => ['style'=>'width:175px;'],
        'contentOptions' => ['style'=>'width:175px;'],
    ],
    //'auth_key',
    //'password_hash',
    //'password_reset_token',
    [
        'attribute' => 'email',
        'format' => 'raw',
        'value' => function ($model) {
            return \yii\helpers\Html::a($model->email, 'mailto:'.$model->email);
        },
    ],
    [
        'attribute' => 'status',
        'value' => function ($model) {
            return $model->status == 10 ? 'Activo' : 'Inactivo';
        },
        'filter' => [10=>'Activo',0=>'Inactivo'],
        'headerOptions' => ['style'=>'width:75px;'],
        'contentOptions' => ['style'=>'width:75px;'],
    ],
    [
        'attribute' => 'created_at',
        'value' => function ($model) {
            return Yii::$app->formatter->asDatetime(strtotime($model->created_at));
        },
        'filter' => false,
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
    ],
    [
        'attribute' => 'updated_at',
        'value' => function ($model) {
            return Yii::$app->formatter->asDatetime(strtotime($model->updated_at));
        },
        'filter' => false,
        'headerOptions' => ['style'=>'width:85px;'],
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
    ],
    [
        'label' => 'Empleado',
        'format' => 'raw',
        'value' => function ($model) {
            $employee = $model->idEmployee;
            return Html::a($employee->fullName, ['/people/employee/view', 'id'=>$employee->id_employee]);
        },
        'filter' => false,
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
    ],
    [
        'label' => 'Último acceso',
        'value' => function ($model) {
            if ($model->lastLogin)
                return Yii::$app->formatter->asDatetime(strtotime($model->lastLogin));
        },
        'filter' => false,
        'headerOptions' => ['style'=>'width:85px;'],
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
        'contentOptions' => ['style'=>'text-align:center;width:150px;'],
    ],
    [
        'label' => 'Roles',
        'format' => 'raw',
        'value' => function ($model) {
            $roles = Yii::$app->authManager->getRolesByUser($model->id);
            $r = '';
            foreach ($roles as $role) {
                //var_dump($role);
                $r .= $role->description.'<br>';
            }
            $r = $r ? : 'No tiene roles asignados <br>';
            return
                $r.\yii\helpers\Html::a('Ampliar información', ['/admin/users/view-info', 'id'=>$model->id], [
                'title' => 'Información ampliada sobre roles y permisos',
               'class' => 'showModal',
            ]);
        },
        'filter' => false,
        'contentOptions' => ['style'=>'width:150px;'],
        'contentOptions' => ['style'=>'width:150px;'],
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'headerOptions' => ['style'=>'width:100px;'],
        'contentOptions' => ['style'=>'text-align:center;width:100px;'],
        'template' => '{view} {update} {delete} {select}',
        'buttons' => $buttons,
        'visible' => 0 ? false : true
    ],
];

return $columns;
?>