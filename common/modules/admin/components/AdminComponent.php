<?php

namespace common\modules\admin\components;

use Yii;
use yii\base\Component;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

use common\modules\admin\models\Log;
use common\modules\admin\models\Users;
use common\modules\people\models\Gender;
use common\modules\people\models\MaritalStatus;
use common\modules\people\models\Language;
use common\modules\admin\models\AuthItemRevoke;
use common\modules\core\models\generic\Categories;
use common\modules\historical\models\PatientTreatmentStatus;
use common\modules\core\models\generic\LogsSms;
use common\modules\marketing\models\ConsultationReason;

class AdminComponent extends Component
{
    /**
     * Configura la sesión para el usuario activo
     */
    public function initAfterLogin()
    {
        $id_user = Yii::$app->user->id;

        // Comprueba si el usuario ya esta logeado.
        $session = Yii::$app->users->checkSessionUser($id_user);
        if ($session === true) {
            // Configuración de la sesión.
            Yii::$app->users->configSessionUser();

            // Registra el acceso
            Yii::$app->users->logAccess();
            //Yii::$app->users->trackerSession();

        } else {
            return $session;
        }

        return true;
    }

    // Return false if @filter not permission
    /**
     * @param $filter
     * @return bool
     */
    public function checkAccess($filter,$idUser=null)
    {
        // Buscar los revocados.
        if(is_null($idUser)) {
            $idUser = Yii::$app->user->id;
        }
        $revoke = AuthItemRevoke::find()->where('name = :filter && id_user = :id', [
            'filter'=>$filter,
            'id'=>$idUser
        ])->one();

        if (!is_null($revoke)) {
            return false;
        }

        if (\Yii::$app->user->identity->username === 'admin') {
            return true;
        }

        if (!is_null(\Yii::$app->people->clinicSelected())){
            if (\Yii::$app->user->can($filter)) {
                return true;
            }
        }

        return false;
    }

    /*public function checkPermission($filter)
    {
        $pmR = Yii::$app->session->get('user.permission');
        if (is_null($pmR)) {
            return false;
        }
        $a = \yii\helpers\Json::decode($pmR);
        return in_array($filter, $a);
    }*/

    /**
     * @param $username
     * @param $password
     * @return int
     */
    public function addUser($username,$password,$email=null,$phone)
    {
        $user = new Users();
        $user->email = $username.'@'.$username.'.es';
        if (!is_null($email)) {
            $user->email = $email;
        }
        $user->username = $username;
        $user->password = $password;
        $user->repeat_password = $password;
        $user->phone;
        if ($user->save()) {
            return $user->id;
        } else {
            var_dump($user->errors);
            exit();
        }
    }

    /**
     * @param $username
     * @param $password
     * @return int
     */
    public function updateUsername($id, $username)
    {
        $user = Users::findOne($id);
        $user->username = $username;

        if ($user->save()) {
            return $user->id;
        } else {
            var_dump($user->errors);
            exit();
        }
    }

    /**
     * @param $username
     * @param $password
     * @return int
     */
    public function updatePassword($username,$password)
    {
        $user = Users::findByUsername($username);
        $user->password = $password;
        if ($user->save()) {
            return $user->id;
        } else {
            var_dump($user->errors);
            exit();
        }
    }

    /**
     * @param $idUser
     * @param $idRole
     */
    /*public function addRole($idUser,$idRole)
    {
        $auth = \Yii::$app->authManager;
        $role = $auth->getRole($idRole);
        $auth->revoke($role, $idUser);
        $auth->assign($role, $idUser);
    }*/

    /**
     * @param $idUser
     * @param $idRole
     * @param $idNewRole
     */
    /*public function editRole($idUser,$idRole,$idNewRole)
    {
        $auth = \Yii::$app->authManager;
        $role = $auth->getRole($idRole);
        if ($role)
            $auth->revoke($role, $idUser);

        $newRole = $auth->getRole($idNewRole);
        $auth->assign($newRole, $idUser);
    }*/

    /**
     * @param $idUser
     * @param $idRole
     */
    /*public function deleteRole($idUser,$idRole)
    {
        $auth = \Yii::$app->authManager;
        $role = $auth->getRole($idRole);
        return $auth->revoke($role, $idUser);
    }*/

    /**
     * @param $type
     * @param $text
     * @return bool
     */
    /*public function addLog($type,$text)
    {
        $log = new Log();
        $log->id_user = isset(Yii::$app->user) ? Yii::$app->user->id : 1;
        $log->type = $type;
        $log->log = $text;
        if ($log->save()) {
            return true;
        } else {
            var_dump($log->errors);
            return false;
        }
    }*/

    /**
     * @param $classModel
     * @param $attribute
     * @param int $length
     * @return string
     */
    /*public function generateUniqueRandomString($classModel, $attribute, $length=10)
    {
        $model = new $classModel;
        $randomString = Yii::$app->getSecurity()->generateRandomString($length);
        if(!$model->findOne([$attribute => $randomString]))
            return $randomString;
        else
            return $this->generateUniqueRandomString($attribute, $length);
    }*/

    /**
     * @param null $day
     * @return array|mixed
     */
    public function getWeekDays($day = null)
    {
        $weekDays = [1=>'Lunes',2=>'Martes',3=>'Miércoles',4=>'Jueves',5=>'Viernes',6=>'Sábado',0=>'Domingo'];
        if (!is_null($day)) {
            return $weekDays[$day];
        }
        return $weekDays;
    }

    /**
     * @param $startDate
     * @param $endDate
     * @param null $saber //Ponemos 1 si queremos saber los días que llevamos, 2 para los que faltan.
     * @param null $holidays
     * @return float|int
     */
    function getWorkingDays($startDate,$endDate,$saber = null, $holidays = null)
    {
        //Pasamos a strtotime para hacer los cálculos

        $today = strtotime("Today");
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);
        $initialDays = ($endDate - $startDate) / 86400;
        /**
         * Pongemos una fecha de inicio y otra de fin, y lo que queremos sacar si son los dias que llevamos o los que faltan
         * Si es una fecha pasada, indicamos desde la fecha de incio a la fecha de fin como trabajados y ponemos 0 a los que faltan
         * ya que es una fecha anterior.
         * Si es una fecha futura ponemos días trabajados 0 y días que faltan los días de las fechas.
         */
        if(($saber == 1 && $endDate < $today) || ($saber == 2 && $startDate > $today)){

        }else{
             if($saber == 1 && $startDate > $today){
                 $endDate = $startDate;
             }else if($saber == 1){
                 $endDate = $today;
             }
             if($saber == 2 && $endDate < $today){
                 $startDate = $endDate;
             }else if($saber == 2){
                 $startDate = $today;
             }
        }

        //El numero total de días entre dos fechas. Contamos el número de segundos y lo dividimos entre 60*60*24
        //Le sumamos uno para incluir ambas fechas en la franja
        $days = ($endDate - $startDate) / 86400 + 1;

        /**
         * Para compensar con los calculos que realiza, sumamos o restamos días conforme necesitemos.
         */
        if($saber == 1 AND $startDate > $today){
            $days -= 1;
        }
        if($saber == 2 AND $startDate > $today){
            if($initialDays > 7){
                $days += 1;
            }else {
                $days += 3;
            }
        } else if($saber == 2 AND $endDate < $today) {
            if($initialDays > 7){
                $days += 0;
            }else {
                $days += 1;
            }
        }

        $no_full_weeks = floor($days / 7);
        $no_remaining_days = fmod($days, 7);

        //Devolvemos 1 si es lunes, 7 si es Domingo
        $the_first_day_of_week = date("N", $startDate);
        $the_last_day_of_week = date("N", $endDate);

        //Las 2 pueden ser iguales en años bisiestos cuando febrero tiene 29 días, el igual se añade aquí
        //En el primer caso, el intervalo completo es dentro de una semana, en el segundo caso el intervalo cae en dos semanas.
        if ($the_first_day_of_week <= $the_last_day_of_week) {
            if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
            if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
        } else {
            //Si el día que empieza de la semana es más tarde que el día que acaba
            if ($the_first_day_of_week == 7) {
                //Si el día es domingo
                $no_remaining_days--;

                if ($the_last_day_of_week == 6) {
                    //Si es sabado
                    $no_remaining_days--;
                }
            } else {
                //La fecha de inicio es sábado (o antes), y la fecha final es (L - V)
                //Nos saltamos el finde y le quitamos 2
                $no_remaining_days -= 2;
            }
        }

        //El número de días laborables es: (Número de días entre 2 fechas) * (5 días trabajados) + resto
        //En febrero ningún año bisiesto dio resto 0 pero calculando fines de semana entre el primer y último día, esta es la forma de solucionarlo
        $workingDays = $no_full_weeks * 5;
        if ($no_remaining_days > 0) {
            $workingDays += $no_remaining_days;
        }

        //Quitamos las vacaciones
        if (!is_null($holidays)) {
            foreach ($holidays as $holiday) {
                $time_stamp = strtotime($holiday);
                //Si las vacaciones no caen en finde
                if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N", $time_stamp) != 6 && date("N", $time_stamp) != 7)
                    $workingDays--;
            }
        }

        return $workingDays;
    }

    /**
     * @param $then
     * @return string
     */
    public function getAge($then)
    {
        $then = date('Ymd', strtotime($then));
        $diff = date('Ymd') - $then;
        return substr($diff, 0, -4);
    }

    /**
     * @param $year
     * @return array
     */
    /*public function getArrayWeeks($year)
    {
        $mes = 12;
        $dia = 31;
        $intentos = 0;
        do {
            $n_weeks = self::getWeek($year . '-' . $mes . '-' . ($dia - $intentos));
            $intentos++;
        } while ($n_weeks < 52);
        $weeks = [];

        for ($i=1; $i<=$n_weeks; $i++) {
            $w = $i < 10 ? "W0".$i : "W".$i;
            $key = $i < 10 ? "0".$i : "".$i;
            $weeks[$key] = 'Semana '.($i).', '.date('d-m-Y', strtotime($year.$w."1"));
        }
        return $weeks;
    }*/

    /**
     * @param $year
     * @return array
     */
    /*public function getArrayMonthWeeks($year)
    {
        $mes = 12;
        $dia = 31;
        $intentos = 0;
        do {
            $n_weeks = self::getWeek($year . '-' . $mes . '-' . ($dia - $intentos));
            $intentos++;
        } while ($n_weeks < 52);
        $weeks = [];
        $month = 0;
        for ($i=1; $i<=$n_weeks; $i++) {
            $w = $i < 10 ? "W0".$i : "W".$i;
            $key = $i < 10 ? "0".$i : "".$i;

            $mesActual = date('m', strtotime($year.$w."1"));
            if($month < $mesActual){
                $nombreMesActual = $this->getMonths($mesActual);
                $weeks[$nombreMesActual] = $nombreMesActual;
                $month++;
            }

            $weeks[$key] = 'Semana '.($i).', '.date('d-m-Y', strtotime($year.$w."1"));
        }
        return $weeks;
    }*/

    /**
     * @param $date
     * @return false|string
     */
    /*public function getWeek($date)
    {
        return date("W", strtotime($date));
    }*/

    /**
     * Validación de DNI,CIF,NIF,NIE
     * @param $attribute
     * @return bool
     */
    public function validateIdentification($attribute)
    {
        $res = false;
        $identidad = strtoupper($attribute);

        //Returns: 0 = NIF ok, 0 = CIF ok, 0 = NIE ok, 1 = NIF bad, 1 = CIF bad, 1 = NIE bad, 0 = OK
        for ($i = 0; $i < 9; $i ++) {
            $num[$i] = substr($identidad, $i, 1);
        }
        //si no tiene un formato valido devuelve error
        if (!preg_match('/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', $identidad)) {
            $res = false;
        }
        //comprobacion de NIFs estandar
        if (preg_match('/(^[0-9]{8}[A-Z]{1}$)/', $identidad)) {
            if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($identidad, 0, 8) % 23, 1)) {
                $res = true;
            }
        }
        //algoritmo para comprobacion de codigos tipo CIF
        $suma = $num[2] + $num[4] + $num[6];
        for ($i = 1; $i < 8; $i += 2) {
            $suma += substr((2 * $num[$i]),0,1) + substr((2 * $num[$i]), 1, 1);
        }
        $n = 10 - substr($suma, strlen($suma) - 1, 1);
        //comprobacion de NIFs especiales (se calculan como CIFs o como NIFs)
        if (preg_match('/^[KLM]{1}/', $identidad)) {
            if ($num[8] == chr(64 + $n) || $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($identidad, 1, 8) % 23, 1)) {
                $res = true;
            }
        }
        //comprobacion de CIFs
        if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $identidad)) {
            if ($num[8] == chr(64 + $n) || $num[8] === substr($n, strlen($n) - 1, 1)) {
                $res = true;
            }
        }
        //comprobacion de NIEs
        if (preg_match('/^[XYZ]{1}/', $identidad)) {
            if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X','Y','Z'), array('0','1','2'), $identidad), 0, 8) % 23, 1)) {
                $res = true;
            }
        }

        return $res;
    }

    /**
     * Validación de Pasaporte
     * @param $attribute
     * @return bool
     */
    public function validatePassport($attribute)
    {
        $res = false;
        $identidad = strtoupper($attribute);

        if (preg_match('/^[a-z]{3}[0-9]{6}[a-z]?$/i', $identidad)) {
            echo 'Paso';
            $res = true;
        }

        return $res;
    }

    public function getDays($pos=null)
    {
        for ($c=1;$c<=31;$c++){
            $days[$c] = $c;
        }

        if (!is_null($pos)) {
            return $days[$pos];
        }
        return $days;
    }

    public function getMonths($pos=null)
    {
        $months = ['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'];
        if (!is_null($pos)) {
            return $months[$pos];
        }
        return $months;
    }

    /**
     * @param null $pos
     * @return array|mixed // Devuelve el valor en ingles del mes
     */
    public function getMonthsEnglish($pos=null)
    {
        $months = ['01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December'];
        if (!is_null($pos)) {
            return $months[$pos];
        }
        return $months;
    }

    /**
     * @param null $pos
     * @return array|mixed // Devuelve el valor en español del mes
     */
    public function getMonthsEng($pos=null)
    {
        $months = ['January'=>'Enero','February'=>'Febrero','March'=>'Mar','April'=>'Abril','May'=>'Mayo','June'=>'Junio','July'=>'Julio','August'=>'Agosto','September'=>'Septiembre','October'=>'Octubre','November'=>'Noviembre','December'=>'Diciembre'];
        if (!is_null($pos)) {
            return $months[$pos];
        }
        return $months;
    }

    /**
     * @param null $pos
     * @return array|mixed // Devuelve el valor en ingles del mes
     */
    public function getMonthsEsp($pos=null)
    {
        $months = ['Enero'=>'January','Febrero'=>'February','Marzo'=>'March','Abril'=>'April','Mayo'=>'May','Junio'=>'June','Julio'=>'July','Agosto'=>'August','Septiembre'=>'September','Octubre'=>'October','Noviembre'=>'November','Diciembre'=>'December'];
        if (!is_null($pos)) {
            return $months[$pos];
        }
        return $months;
    }

    /*public function getParseUrl($url)
    {
        $parsedUrl = parse_url($url);
        $parsedUrl['scheme'] = key_exists('scheme', $parsedUrl) && strlen($parsedUrl['scheme'])
        > 0 ? trim($parsedUrl['scheme']) : NULL;
        $parsedUrl['host'] = key_exists('host', $parsedUrl) && strlen($parsedUrl['host'])
        > 0 ? trim($parsedUrl['host']) : NULL;
        $parsedUrl['port'] = key_exists('port', $parsedUrl) && $parsedUrl['port']
        > 0 ? trim($parsedUrl['port']) : NULL;
        $parsedUrl['path'] = key_exists('path', $parsedUrl) && strlen($parsedUrl['path'])
        > 0 ? trim($parsedUrl['path']) : NULL;
        $parsedUrl['query'] = key_exists('query', $parsedUrl) > 0 ? trim($parsedUrl['query']) : "";
        $array = array();
        parse_str($parsedUrl['query'], $array);
        $parsedUrl['query'] = $array;

        return $parsedUrl;
    }*/

    public function getFirstDayOfMonth()
    {
        $date = new \DateTime(date('Y-m-d', time()));
        $day = $date->modify('first day of this month');
        return $day;
    }

    public function getLastDayOfMonth()
    {
        $date = new \DateTime(date('Y-m-d', time()));
        $day = $date->modify('last day of this month');
        return $day;
    }

    public function getFirstDayOfWeek($date=null)
    {
        if (!$date)
            $date = date('Y-m-d', time());

        $day = date("Y-m-d", strtotime('monday this week', strtotime($date)));
        return $day;
    }

    public function getLastDayOfWeek($date=null)
    {
        if (is_null($date))
            $date = date('Y-m-d', time());

        $day = date("Y-m-d", strtotime('sunday this week', strtotime($date)));
        return $day;
    }

    /**
     * Generador de contraseña
     * @param int $length
     * @return string
     * @throws Exception
     */
    public function generatePassword($length = 8)
    {
        do{
            $password = Yii::$app->getSecurity()->generateRandomString((int)$length);
        }while(!preg_match('/^(?=.*[a-z])/',$password) OR !preg_match('/^(?=.*[A-Z])/',$password) OR !preg_match('/^(?=.*\d)/',$password));
        return $password;
    }

    /*public function setCellColor($phpExcel,$cell,$color='FFCCCCCC')
    {
        $phpExcel->getActiveSheet()->getStyle($cell)->applyFromArray(
            ['fill' 	=> [
                'type'		=> \PHPExcel_Style_Fill::FILL_SOLID,
                'color'		=> ['argb' => $color]
            ]]
        );

        return $phpExcel;
    }*/

    /*public function setCellFormat($phpExcel,$cell,$format=null)
    {
        $phpExcel->getActiveSheet()
            ->getStyle($cell)
            ->getNumberFormat()
            ->setFormatCode(
                \PHPExcel_Style_NumberFormat::FORMAT_TEXT
            );

        return $phpExcel;
    }*/

    public function eliminarEspacios($string)
    {
        $string = strtr($string, [' '=>' ']);//Quita el caracter Alt+255 y lo sustituye por un espacio normal
        $string = preg_replace('/( ){2,}/u',' ',$string);
        $string = trim($string);

        return $string;
    }

    /**
     * Calcular la distancia entre coordenadas
     * @param $lat1
     * @param $long1
     * @param $lat2
     * @param $long2
     * @return float
     */
    /*public function calculateDistance($lat1,$long1,$lat2,$long2)
    {
        $km = 111.302;

        //1 Grado = 0.01745329 Radianes
        $degtorad = 0.01745329;

        //1 Radian = 57.29577951 Grados
        $radtodeg = 57.29577951;
        //La formula que calcula la distancia en grados en una esfera, llamada formula de Harvestine. Para mas informacion hay que mirar en Wikipedia
        //http://es.wikipedia.org/wiki/F%C3%B3rmula_del_Haversine
        $dlong = ($long1 - $long2);
        $dvalue = (sin($lat1 * $degtorad) * sin($lat2 * $degtorad)) + (cos($lat1 * $degtorad) * cos($lat2 * $degtorad) * cos($dlong * $degtorad));
        $dd = acos($dvalue) * $radtodeg;

        return round(($dd * $km), 2);
    }*/

    function formatSizeUnits($bytes){
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}