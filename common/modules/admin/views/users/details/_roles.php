<?php

use common\classes\Html;
use kartik\select2\Select2;

$data = [];
$roles = \common\modules\admin\models\AuthItem::getDropDownListuser(Yii::$app->user->id);
foreach ($roles as $rol){
    $categoria = substr($rol, 0, 1);
    $puesto = substr($rol, 1, 1);
    $role = substr($rol, 2, 1);
    $authItems = \common\modules\admin\models\AuthItem::getDropDownListLevel($categoria,$puesto,$role);
    foreach($authItems as $key => $item){
        if(!in_array($item, $data, true)){
            $data[$key]=$item;
        }
    }
}
$url = \yii\helpers\Url::to(['auth-assignment/assign', 'id'=>$model->id]);

$searchModel = new \common\modules\admin\searchs\AuthAssignmentSearch();
$searchModel->user_id = $model->id;
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
?>

<label>Añadir un role</label>
<?= Select2::widget([
    'name' => 'name',
    'data' => $data,
    'options' => [
        'placeholder' => 'Selecciona un role',
        'onchange' => '
            val = $(this).val();
            $.ajax({
                url: "'.$url.'",
                data: {items: val},
                type: "POST",
                success: function (data) {
                    if (data == "Error") {
                        alert("Hay un error");
                    }
                    $.pjax.reload({container:"#pjax-auth-assignments"});
                },
                error: function (xhr, ajaxOptions, thrownError) {}
            });
        '
    ],
    'pluginOptions' => [
        'allowClear' => true
    ],
]) ?>

<?= $this->render('@modules/admin/views/auth-assignment/views/_grid_generic', [
    'model' => $model,
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
]) ?>