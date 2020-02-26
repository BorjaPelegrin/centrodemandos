<?php
// Comprobar si tiene creados los horarios
$ce = Yii::$app->user->identity->clinicEmployee;
$horary = \common\modules\people\models\ClinicEmployeeHorary::findAll([
    'id_clinic_employee' => $ce->id_clinic_employee,
]);
// Si no tiene los 7 días configurados te redirige a la configuración
if (count($horary)<7 && (Yii::$app->controller->id != 'employee' || Yii::$app->controller->action->id != 'view') && $ce->id_employee_type != \common\modules\people\models\EmployeeType::EMPLOYEE_TYPE_CENTRAL) {
    Yii::$app->response->redirect(['/people/employee/view', 'id'=>$ce->id_employee]);
}
?>