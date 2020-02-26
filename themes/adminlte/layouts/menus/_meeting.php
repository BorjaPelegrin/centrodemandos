<?php
use common\classes\Html;
use \common\modules\crm\models\CrmTickets;
$meetings = Yii::$app->crm->AllMeetingsUser();
$count = count($meetings);
//$count = Yii::$app->crm->AllMeetingsUserUnread();
//$count = Yii::$app->crm->AllMeetingsUserToday();

$this->registerCss('
.block-with-text {
    max-height: 61px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    white-space: normal;
}
');

$url = \yii\helpers\Url::to(['/crm/meetings/confirmed']);
?>

<!-- tickets: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Reuniones">
        <i class="fa fa-users"></i>
        <?php if ($count > 0) : ?>
            <span class="label label-danger"><?= $count ?></span>
        <?php endif ?>
    </a>
    <ul class="dropdown-menu" style="width: 500px">
        <li class="header">Reuniones activas: <?= $count ?></li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu" style="max-height: 500px">
                <?php foreach ($meetings as $meeting) : ?>
                    <li>
                        <div id="meeting-<?= $meeting->id_meeting ?>" style="display:inline-block;width:25%;padding-left: 5px;">
                            <?= \yii\helpers\Html::a('<i class="fa fa-check"></i> Asistiré','#',
                                [
                                    'class' => 'btn btn-success',
                                    'style' => 'margin-top: -48px;width: 100px',
                                    'data-toggle' => 'tooltip',
                                    'onclick'=> '
                                        $.post( "'.$url.'?id="+'.$meeting->id_meeting.'+"&status=1")
                                           .done(function( data ) {
                                                $("#meeting-'.$meeting->id_meeting.'").next().css("color","green")
                                                alert( "Elección confirmada" );
                                           })
                                           .fail(function() {
                                                alert( "error" );
                                           })',
                                    'title' => 'Confirmar asistencia',
                                ]
                            ); ?>

                            <?= \yii\helpers\Html::a('<i class="fa fa-times"></i> No asistiré', '#',
                                [
                                    'class' => 'btn btn-danger',
                                    'style' => 'margin-top: -20px;width: 100px',
                                    'onclick'=> '
                                        $.post( "'.$url.'?id="+'.$meeting->id_meeting.'+"&status=0")
                                           .done(function( data ) {
                                                $("#meeting-'.$meeting->id_meeting.'").next().css("color","red")
                                                alert( "Elección confirmada" );
                                           })
                                           .fail(function() {
                                                alert( "error" );
                                           })',
                                    'title' => 'Confirmar no asistencia',
                                ]
                            ); ?>
                        </div>
                        <?php if($meeting->participantUserSelected->status == 1){
                            $color = 'color: green;';
                        }elseif ($meeting->participantUserSelected->status === 0){
                            $color = 'color: red;';
                        } ?>
                        <?= Html::a('<div>'.$meeting->title.'<br><small>'.Yii::$app->formatter->asDatetime($meeting->date_start).' - '.Yii::$app->formatter->asDatetime($meeting->date_finish).'</small></div><h3 class="block-with-text">'.$meeting->content.'</h3>',
                            ['/crm/meetings/view', 'id'=>$meeting->id_meeting],
                            [
                                'style' => 'display:inline-block;width:67%;padding: 1px 10px;'.$color,
                            ]
                        ) ?>
                    </li>

                <?php endforeach; ?>
            </ul>
        </li>
        <li class="footer">
            <div class="row">
                <div class="col-md-6" style="padding: 0 30px;">
                    <?= Html::a('<i class="fa fa-plus"></i> Añadir reunión', ['/crm/meetings/create'], [
                        'title' => 'Reunión',
                    ]) ?>
                </div>
                <div class="col-md-6" style="padding: 0 30px;">
                    <?= Html::a('<i class="fa fa-navicon"></i> Reuniones', ['/crm/meetings/index'], ['class' => '']) ?>
                </div>
            </div>
        </li>
    </ul>
</li>

