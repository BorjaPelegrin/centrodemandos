<?php

namespace common\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\web\NotFoundHttpException;

use common\modules\people\models\Employee;
use common\modules\people\models\ClinicEmployee;

/**
 * This is the model class for table "yii_user".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property string $interface_locale
 * @property string $extra
 * @property string $created_at
 * @property string $updated_at
 *
 * @property string $id_clinic
 * @property string $id_employee;
 * @property string $db_clinic;
 * @property ClinicEmployee[] $clinicEmployee
 * @property Employee[] $idEmployee
 */
class Users extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public $password;
    public $repeat_password;
    public $id_clinic;
    public $id_employee;
    public $id_area;
    public $db_clinic;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['firstname', 'lastname', 'auth_key', 'access_token'], 'string', 'max' => 32],
            [['username'], 'unique'],
            //[['email', 'phone'], 'unique'],
            [['phone'], 'string', 'min' => 9],
            [['phone'], 'string', 'max' => 20],

            [['interface_locale'], 'string', 'max' => 16],
            [['extra'], 'safe'],
            [['password_reset_token'], 'unique'],

            [['password'], 'string', 'min' => 8],
            [['password'], 'string', 'max' => 15],
            //Original: [['password'], 'match', 'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}[^\'\s]/', 'message'=>'Su contraseña no es segura'],
            [['password'], 'match', 'pattern' => '/^(?=.*[a-z])/', 'message'=>'Al menos una letra minúscula'],
            [['password'], 'match', 'pattern' => '/^(?=.*[A-Z])/', 'message'=>'Al menos una letra mayúscula'],
            [['password'], 'match', 'pattern' => '/^(?=.*\d)/', 'message'=>'Al menos un dígito'],
            //[['password'], 'match', 'pattern' => '/^[A-Za-z\d-_$@$!%*?&]{8,15}[^\'\s]/', 'message'=>\Yii::t('app','Sin espacios en blanco')],
            //[['password'], 'match', 'pattern' => '/^(?=.*[-_$@$!%*?&])/', 'message'=>\Yii::t('app','Al menos 1 caracter especial')],
            [['repeat_password'], 'comparePassword', 'skipOnError' => false],

            [['password', 'repeat_password'], 'required', 'when' => function ($model) {
                return $model->password != '';
            }, 'whenClient' => "function (attribute, value) {
                return $('#password').val() != '';
            }"],

            [['password'], 'noRepeatPassword'],
            [['phone'], 'required', 'on'=>'create'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Nombre',
            'lastname' => 'Apellido',
            'username' => 'Usuario',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Estado',
            'interface_local' => 'Idioma',
            'extra' => 'Comentarios',
            'created_at' => 'Fecha de creación',
            'updated_at' => 'Fecha de actualización',
            'id_clinic' => 'Clínica',
            'password' => 'Contraseña',
            'repeat_password' => 'Repetir contraseña',
        ];
    }

    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        parent::afterFind();
        /*$clinic = ClinicEmployee::find()
            ->select('id_clinic')
            ->where(['id_user'=>$this->id])
            ->asArray()
            ->one();
        $this->id_clinic = $clinic['id_clinic'];
        if (Yii::$app->session->get('user.id_clinic')) {
            $this->id_clinic = Yii::$app->session->get('user.id_clinic');
        }*/
        
        $this->id_clinic = Yii::$app->session->get('user.id_clinic');
        $this->db_clinic = Yii::$app->session->get('user.db_clinic');

        $employee = Employee::find()->where(['id_user'=>$this->id])->asArray()->one();
        $this->id_employee = $employee['id_employee'];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->setPassword($this->password);
                $this->generateAuthKey();
                $this->access_token = $this->getUniqueAccessToken();
                // Se actualiza mediante behaviors
                //$this->created_at = new Expression('NOW()');
                //$this->updated_at = new Expression('NOW()');
            } else {
                if (!empty($this->password)) {
                    $this->setPassword($this->password);
                    $this->generateAuthKey();
                    $this->setOldPassword();
                }
                // Se actualiza mediante behaviors
                //$this->updated_at = new Expression('NOW()');
            }

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        if (!$token || $token == '0101010101010101') {
            throw new NotFoundHttpException('Valid user not found');
        }

        $res = static::findOne([
            'access_token' => $token,
            'status' => self::STATUS_ACTIVE
        ]);
        if (empty($res))
            throw new NotFoundHttpException('Valid user not found');

        return $res;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne([
            'username' => $username,
            // 'status' => self::STATUS_ACTIVE
        ]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function getUniqueAccessToken()
    {
        $token = md5(Yii::$app->security->generateRandomString() . '_' . time());
        $res = static::findOne(['access_token' => $token]);
        if ($res) {
            $token = $this->getUniqueAccessToken();
        }
        return $token;
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * Removes password reset code
     */
    public function removePasswordResetCode()
    {
        $this->password_reset_code = null;
    }

    function comparePassword($attribute, $params)
    {
        if ($this->password != $this->{$attribute})
            $this->addError(
                $attribute,
                'Las contraseñas no coinciden'
            );
    }

    function noRepeatPassword($attribute, $params)
    {
        $oldPassword = Yii::$app->security->generatePasswordHash($this->password);
        $mOldPassword = UserOldpassword::find()->where(['password_hash'=>$oldPassword])->one();

        if ($mOldPassword)
            $this->addError(
                $attribute,
                'La contraseña ya existe'
            );
    }

    public static function getDropDownList()
    {
        return ArrayHelper::map(Users::find()->all(), 'id', 'username');
    }

    public function getFullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUserEntity()
    {
        return $this->hasOne(UserEntity::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClinicEmployee()
    {
        return $this->hasOne(ClinicEmployee::className(), ['id_user' => 'id'])->andWhere(['id_clinic' => $this->id_clinic]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmployee()
    {
        return $this->hasOne(Employee::className(), ['id_user' => 'id']);
    }

    /**
     * Change User in ejecution time
     * @param $id = id_user
     */
    public static function changeUser($clinicEmployee)
    {
        $employee = \Yii::$app->user->identity->clinicEmployee;
        // Todo: comprobar que el usuario pertenece para esa clínica
        $control = ClinicEmployee::find()->where('id_clinic = :id_c && id_employee = :id_e', ['id_c'=>$clinicEmployee->id_clinic, 'id_e'=>$employee->id_employee])->one();
        if (!is_null($control)) {
            $initialId = \Yii::$app->user->id; //here is the current ID, so you can go back after that.
            if ($clinicEmployee->id_user != $initialId) {
                $user = Users::findOne($clinicEmployee->id_user);
                $duration = 0;
                Yii::$app->user->switchIdentity($user, $duration); //Change the current user.
                Yii::$app->session->set('user.idbeforeswitch', $initialId); //Save in the session the id of your admin user.
                Yii::$app->session->set('user.id_clinic', $clinicEmployee->id_clinic);
                Yii::$app->session->set('user.id_area', null);
                Yii::$app->session->set('user.db_clinic', $clinicEmployee->id_clinic);
                $modelClinic = \common\modules\clinic\models\Clinic::findOne(['id_clinic'=>$clinicEmployee->id_clinic]);
                $clinic = [
                    'id_clinic' => $clinicEmployee->id_clinic,
                    'name' => $modelClinic->name
                ];
                Yii::$app->session->set('user.clinicId', Json::encode($clinic));
                Yii::$app->session->set('user.clinicDb', Json::encode($clinic));
                $pmR = Yii::$app->permission->getPermissionsUser($clinicEmployee->id_user);
                \Yii::$app->session->set('user.permission', \yii\helpers\Json::encode($pmR));
            }
        }
    }

    public function setOldPassword()
    {
        $oldPassword = new UserOldpassword();
        $oldPassword->user_id = $this->id;
        $oldPassword->username = $this->username;
        $oldPassword->auth_key = $this->auth_key;
        $oldPassword->password_hash = $this->password_hash;
        if (!$oldPassword->save()) {
            var_dump($oldPassword->errors);
        }
    }

    public function getClinicId()
    {
        $arrayClinic = Json::decode(Yii::$app->session->get('user.clinicId'));
        $clinic = new \common\modules\clinic\models\Clinic();

        foreach ($arrayClinic AS $key => $property){
            $clinic->{$key} = $property;
        }

        return $clinic;
    }

    public function getClinicDb()
    {
        $arrayClinic = Json::decode(Yii::$app->session->get('user.clinicDb'));
        $clinic = new \common\modules\clinic\models\Clinic();

        foreach ($arrayClinic AS $key => $property){
            $clinic->{$key} = $property;
        }

        return $clinic;
    }

    public function getLastLogin()
    {
        $lastLogin = UserLogin::find()->where(['user_id'=>$this->id])->orderBy('created_at DESC')->one();

        return $lastLogin->created_at;
    }
}
