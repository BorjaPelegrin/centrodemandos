<?php

use common\classes\Html;

$this->registerCss('
.notifications-menu .label-warning {
    animation-name: parpadeo;
    animation-duration: 1s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    
    -webkit-animation-name:parpadeo;
    -webkit-animation-duration: 1s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: 10;
    
     font-size: 14px !important;
}

@-moz-keyframes parpadeo{  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@-webkit-keyframes parpadeo {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@keyframes parpadeo {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}
');

$notifications = Yii::$app->notification->AllNotificationsUser();
$count = count($notifications);
?>

<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notificaciones">
        <i class="fa fa-bell-o"></i>
        <?php if ($count > 0) : ?>
            <span class="label label-warning"><?= $count ?></span>
        <?php endif ?>
    </a>
    <ul class="dropdown-menu" style="width: 450px">
        <li class="header">Tienes <?= count($notifications) ?> notificaciones</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu" style="max-height: 350px">
                <?php
                foreach ($notifications as $notification) :
                    ?>
                    <li>
                        <?php
                        switch ($notification->type){
                            case 'success' :
                                $iconColor = '#00a65a';
                                break;
                            case 'info' :
                                $iconColor = '#00c0ef';
                                break;
                            case 'warning' :
                                $iconColor = '#f0ad4e';
                                break;
                            case 'danger' :
                                $iconColor = '#d9534f';
                                break;
                        }

                        $infoEmpleado = $notification->id_clinic ? '<i class="fa fa-home" style="color:'.$iconColor.'"></i> - ' : '';
                        $infoClinica = $notification->id_clinic_employee ? '<i class="fa fa-user" style="color:'.$iconColor.'"></i><strong>'.$notification->idClinicEmployee->idEmployee->fullname. ' - ' . $notification->idClinicEmployee->clinicName.'</strong> - ' : '';

                        ?>
                        <?= Html::a($infoEmpleado . $infoClinica . $notification->title,
                            ['/communication/notification/view-ajax', 'id'=>$notification->id_notification, 'id_clinic_notfication_assigned' => $notification->id_clinic_notfication_assigned,'id_clinic_employee_notfication_assigned' => $notification->id_clinic_employee_notfication_assigned, 'status_notification_assigned'=> $notification->status_notification_assigned],
                            [
                                'class' => 'showModal',
                                'data-toggle' => 'tooltip',
                                'data-color' => $notification->type,
                                'title' => $notification->title,
                                //'data-size' => 'modal-lg'
                            ]
                        ) ?>
                    </li>
                <?php
                endforeach;
                ?>
            </ul>
        </li>
        <li class="footer">
            <div class="row">
                <div class="col-md-6" style="padding: 0 30px;">
                    <?= Yii::$app->admin->checkPermission('/communication/notification/form-ajax') ? Html::a('<i class="fa fa-plus"></i> Nueva',
                        ['/communication/notification/form-ajax'],
                        [
                            'class' => 'showModal',
                            'data-toggle' => 'tooltip',
                            'title' => 'Nueva notificación',
                            'data-size' => 'modal-lg',
                        ]
                    ) : '' ?>
                </div>
                <div class="col-md-6" style="padding: 0 30px;">
                    <?= Yii::$app->admin->checkPermission('/communication/notification/index') ? Html::a('<i class="fa fa-navicon"></i> Todas',
                        ['/communication/notification/index'],
                        [
                            'class' => '',
                            'data-toggle' => 'tooltip',
                            'title' => 'Notificación',
                        ]
                    ) : '' ?>
                </div>
            </div>
        </li>
    </ul>
</li>
