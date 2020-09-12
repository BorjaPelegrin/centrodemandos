<?php

//use common\classes\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\admin\models\Users */

$this->title = 'Mi perfil de usuario';
// Todo: si es administrador que pueda vers este enlace al index
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    <div class="row">
        <div class="col-md-3">
            <?= $this->render('views/_detail', [
                'model' => $model
            ]) ?>
        </div>
        <div class="col-md-9">
            <?= @themes\adminlte\widgets\AdminlteBox::widget([
                'buttons' => $buttons,
                'content' => $this->render('views/_related', [
                    'model' => $model,
                    'entity' => $entity
                ]),
                'options' => [
                    'class' => isset($options['class']) ? $options['class'] : 'box-primary',
                    'class-header' => 'with-border',
                    'box-title' => 'Información relacionada',
                ],
            ]) ?>
        </div>
    </div>

<?php /*
    <div class="row">
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                        <?= Html::img('@web/img/profile.png',['class'=>'img-circle','alt'=>'User image']); ?>
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username"><?= $model->username ?></h3>
                    <h5 class="widget-user-desc">
                        <?= \Yii::$app->controller->action->id == 'view' ?
                            Html::a('Actualizar', ['/admin/users/update', 'id'=>$model->id], ['style'=>'color:#fff'])
                            : Html::a('Ver', ['/admin/users/view', 'id'=>$model->id], ['style'=>'color:#fff']) ?>
                    </h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><?= Html::a('Eliminar mi cuenta', ['delete', 'id' => $model->id], [
                                'class' => '',
                                'data' => [
                                    'confirm' => 'Si eliminas tu cuenta todos tus datos se perderán, ¿estás seguro?',
                                    'method' => 'post',
                                ],
                            ]) ?></li>
                    </ul>
                </div>
                <div>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'username',
                            //'auth_key',
                            //'password_hash',
                            //'password_reset_token',
                            'email:email',
                            'status',
                            'created_at',
                            'updated_at',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-warning">
                <div class="box-header">
                    <i class="fa fa-navicon"></i>
                    <h3 class="box-title">Información relacionada</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">

                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <?= Tabs::widget([
                        'navType' => 'nav-pills',
                        'options' => [
                            'id' => 'leadTabs',
                        ],
                        'items' => [
                            [
                                'label' => 'Roles',
                                'content' => Yii::$app->view->render('details/_roles', [
                                    'model' => $model,
                                    'searchModel' => $searchModelRoles,
                                    'dataProvider' => $dataProviderRoles,
                                ]),
                                'active' => true,
                                'visible' => true
                            ],
                            [
                                'label' => 'Permisos',
                                'content' => Yii::$app->view->render('details/_permission', [
                                    'model' => $model,
                                    'searchModel' => $searchModelRoles,
                                    'dataProvider' => $dataProviderRoles,
                                ]),
                                'active' => false,
                                'visible' => true
                            ],
                        ],
                    ]) ?>
                </div>
                <div class="box-footer clearfix">
                    Más información relacionada con el paciente
                </div>
            </div>
        </div>
    </div>
*/ ?>

</div>
