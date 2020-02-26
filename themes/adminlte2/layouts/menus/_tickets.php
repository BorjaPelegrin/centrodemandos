<?php
use common\classes\Html;
use \common\modules\crm\models\CrmTickets;
$tickets = Yii::$app->crm->AllTicketsUser();
$count = Yii::$app->crm->AllTicketsUserPending();

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

?>

<!-- tickets: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Tickets">
        <i class="fa fa-bug"></i>
        <?php if ($count > 0) : ?>
            <span class="label label-danger"><?= $count ?></span>
        <?php endif ?>
    </a>
    <ul class="dropdown-menu" style="width: 500px">
        <li class="header">Tickets activos: <?= $count ?></li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu" style="max-height: 500px">
                <?php
                    foreach ($tickets as $ticket) :
                        switch($ticket->status_id){
                            case CrmTickets::STATUS_CREATED:
                                $status = 'Nuevo';
                                $style = '';
                                break;
                            case CrmTickets::STATUS_COMMENTED:
                                if ($ticket->updated_user_id != Yii::$app->user->id) {
                                    $style = 'background-color: #dd4b39;color:#fff;';
                                } elseif ($ticket->updated_user_id == Yii::$app->user->id){
                                    $style = 'background-color: #00a65a;color:#fff;';
                                }
                                $status = '';
                                break;
                        }
                ?>
                    <li style="<?= $style ?>">
                        <?php $lastComment = $this->render('@common/modules/crm/views/comments/views/_last_comments_without_style', [
                        'ticket' => $ticket
                        ]);
                        ?>
                        <?= Html::a($ticket->idCreatedUser->fullName.' - '.$ticket->associatedId->name.'<small class="pull-right">'.$status.'</small><h3 class="block-with-text">'.$ticket->description.'</h3>' . $lastComment, ['/crm/tickets/view', 'id'=>$ticket->id_ticket]) ?>
                    </li>
                <?php
                    endforeach;
                ?>
            </ul>
        </li>
        <li class="footer">
            <div class="row">
                <div class="col-md-6" style="padding: 0 30px;">
                    <?= Html::a('<i class="fa fa-plus"></i> Añadir ticket', ['/crm/tickets/form-ajax',
                        'associatedTb'=>'clinic', 'associatedId'=>Yii::$app->people->clinicSelected()->id_clinic], [
                        'title' => 'Incidencia',
                        'class' => 'showModal',
                        'data-size' => 'modal-lg'
                    ]) ?>
                </div>
                <div class="col-md-6" style="padding: 0 30px;">
                    <?= Html::a('<i class="fa fa-navicon"></i> Mis tickets', ['/crm/tickets/index'], ['class' => '']) ?>
                </div>
            </div>
        </li>
    </ul>
</li>

