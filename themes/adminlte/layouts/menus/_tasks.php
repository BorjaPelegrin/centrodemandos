<?php
use common\classes\Html;

$tasks = Yii::$app->crm->AllTasksUser();
$count = count($tasks);


?>

<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Tareas">
        <i class="fa fa-flag-o"></i>
        <?php if ($count > 0) : ?>
            <span class="label label-danger"><?= $count ?></span>
        <?php endif ?>
    </a>
    <ul class="dropdown-menu" style="width: 450px">
        <li class="header">Tareas pendientes: <?= $count ?></li>
        <li>
            <!-- inner menu: contains the actual data -->
            <?php
                $lis = '';
                foreach ($tasks as $task) {
                    $lis .= Html::tag('li', Html::a('<h3>'.$task->task.'<small class="pull-right">'.$task->clinic->name.' / '.$task->progress.'%</small></h3>', ['/crm/tasks/view', 'id'=>$task->id_task], ['class' => '']));
                }
            ?>
            <?= Html::tag('ul', $lis, ['class'=>'menu']) ?>
        </li>
        <li class="footer">
            <div class="row">
                <div class="col-md-6" style="padding: 0 30px;">
                    <?= Html::a('<i class="fa fa-plus"></i> Añadir tarea', ['/crm/tasks/form-ajax'], [
                        'title' => 'Añadir tarea',
                        'class' => 'showModal',
                        'data-size' => 'modal-lg'
                    ]) ?>
                </div>
                <div class="col-md-6" style="padding: 0 30px;">
                    <?= Yii::$app->admin->checkPermission('/crm/tasks/form-ajax') ? Html::a('<i class="fa fa-navicon"></i> Todas', ['/crm/tasks/index'], ['class' => '']) : '' ?>
                </div>
            </div>
        </li>
    </ul>
</li>

<?php
    /* Pruebas
    $count = ($count > 0) ? '<span class="label label-danger">'.$count.'</span>' : '';
    $icon = Html::tag('i', $count);
    $btn = Html::a('<i class="fa fa-flag-o"></i>', '#', [
        'data-toggle' => 'dropdown',
        'title' => 'Tareas',
    ]);
    $uls = Html::tag('ul', $lis, ['class'=>'dropdown-menu'])
?>

<?= Html::tag('li', $btn.$uls, ['class'=>'dropdown tasks-menu']) */ ?>