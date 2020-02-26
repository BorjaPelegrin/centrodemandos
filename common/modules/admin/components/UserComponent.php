<?php

namespace common\modules\admin\components;

use Yii;
use yii\helpers\Json;
use yii\base\Component;
use yii\helpers\ArrayHelper;

use common\modules\admin\models\Users;
use common\modules\admin\models\Session;
use common\modules\admin\models\UserEntity;
use common\modules\admin\models\UserLogin;

class UserComponent extends Component
{/*
    public function checkSessionUser($id_user)
    {
        $sessions = Session::find()->where([
            'user_id' => $id_user
        ])->orderBy('last_write')->all();

        if (count($sessions) >= Yii::$app->params['user.maxsessions']) {
            //Yii::$app->user->logout();
            foreach ($sessions AS $session){
                $session->delete();
            }
            //return $sessions;
        }

        return true;
    }*/
/*
    public function configSessionUser()
    {
        $clinicEmployee = ClinicEmployee::find()->where(['id_user' => Yii::$app->user->id])->asArray()->orderBy('`clinic_employee`.`is_default` DESC')->one();
        Yii::$app->session->set('user.id_clinic', $clinicEmployee['id_clinic']);
        Yii::$app->session->set('user.db_clinic', $clinicEmployee['id_clinic']);
        $modelClinic = Clinic::find()->where(['id_clinic'=>$clinicEmployee['id_clinic']])->asArray()->one();
        $clinic = [
            'id_clinic' => $clinicEmployee['id_clinic'],
            'name' => $modelClinic['name']
        ];
        Yii::$app->session->set('user.clinicId', Json::encode($clinic));
        Yii::$app->session->set('user.clinicDb', Json::encode($clinic));

        Yii::$app->permission->assignRolesToClinicEmployeeUser($clinicEmployee);
    }*/
/*
    public function getUsers()
    {
        //return ArrayHelper::map(Users::find()->all(), 'id', 'fullName');
    }*/
/*
    public function getUsersEntity()
    {
        $entities = UserEntity::find()
            ->select('user_id')
            ->where(['associated_id'=>Yii::$app->user->identity->idUserEntity->associated_id])
            ->asArray()
            ->all();
        $users = [];
        foreach ($entities as $key => $entity) {
            $users [] = $entity['user_id'];
        }

        return $users;
    }*/
/*
    public function changeRoles($clinic='demo')
    {
        $user = Yii::$app->user;

        $id = $user->id;
        $auth = Yii::$app->authManager;
        $roles = $auth->getRolesByUser($id);
        foreach ($roles as $role) {
            $auth->revoke($role, $id);
        }

        $entity = $user->identity->idUserEntity;
        $extraData = json_decode($entity->extra_data);

        foreach ($extraData->clinics->{$clinic}->roles as $roleName) {
            $role = $auth->getRole($roleName);
            $auth->assign($role, $id);
        }
    }*/
/*
    public function logAccess()
    {
        $userLogin = new UserLogin;
        $userLogin->user_id = Yii::$app->user->id;
        $userLogin->client_ip = Yii::$app->request->userIp;
        $userLogin->http_user_agent = Json::encode(Yii::$app->request->userAgent);
        if (!$userLogin->save()) {
            var_dump($userLogin->errors);
        }

        // Registra el acceso
        $data = [
            'id' => Yii::$app->user->id,
            'username' => Yii::$app->user->identity->username,
            'ip' => Yii::$app->request->userIP,
            'userAgent' => Yii::$app->request->userAgent
        ];
        \Yii::$app->admin->addLog('Acceso', Json::encode($data));
    }*/
/*
    public function trackerSession()
    {
        $idSession = Yii::$app->tracker->addSession();
        // Url Referrer
        $urlR = Yii::$app->request->referrer;
        // Url Location
        $urlL = Yii::$app->request->url;
        $re = Yii::$app->tracker->addUrlTracker($urlR, $urlL, $idSession);
    }
*/
    /**
     * Change User in ejecution time
     * @param $id = id_user
     */
    /*public function changeUser($clinicEmployee)
    {
        // Elimino los roles actuales.
        $idUser = Yii::$app->user->id;
        $auth = \Yii::$app->authManager;
        $auth->revokeAll($idUser);

        // Le asigno la clínica a la sesión
        Yii::$app->session->set('user.id_clinic', $clinicEmployee->id_clinic);
        Yii::$app->session->set('user.id_area', null);
        Yii::$app->session->set('user.permission', null);
        Yii::$app->session->set('user.db_clinic', $clinicEmployee->id_clinic);
        $modelClinic = Clinic::findOne(['id_clinic'=>$clinicEmployee->id_clinic]);
        $clinic = [
            'id_clinic' => $clinicEmployee->id_clinic,
            'name' => $modelClinic->name
        ];
        Yii::$app->session->set('user.clinicId', Json::encode($clinic));
        Yii::$app->session->set('user.clinicDb', Json::encode($clinic));

        // Elimino los roles que tenga
        $roles = Yii::$app->permission->getPermissionRolesType('clinic_employee',$clinicEmployee->id_clinic_employee);
        foreach ($roles as $role) {
            $auth->revoke($role, $idUser);
        }
        // Le asigno los nuevos roles al usuario.
        foreach ($roles as $role) {
            $auth->assign($role, $idUser);
        }

        $pmR = Yii::$app->permission->getPermissionsUser(Yii::$app->user->id);
        Yii::$app->session->set('user.permission', \yii\helpers\Json::encode($pmR));
    }*/
}