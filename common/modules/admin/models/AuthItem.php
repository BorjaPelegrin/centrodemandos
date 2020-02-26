<?php

namespace common\modules\admin\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "yii_auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 */
class AuthItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_auth_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Nombre',
            'type' => 'Tipo',
            'description' => 'Descripción',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getDropDownList()
    {
        $search = AuthItem::find()->where([
            'type' => 1,
        ])
            //->andWhere('level <= :level', ['level'=> Yii::$app->user->identity->level])
            ->all();

        return ArrayHelper::map($search, 'name', 'description');
    }

    public static function getDropDownListUser($user_id)
    {
        $search = AuthItem::find()->where([
            'user_id' => $user_id,
        ])
            ->innerJoin(['yii_auth_assignment aa'], 'aa.item_name = yii_auth_item.name')
            //->andWhere('level <= :level', ['level'=> Yii::$app->user->identity->level])
            ->all();

        return ArrayHelper::map($search, 'name', 'level');
    }

    public static function getDropDownListLevel($categoria,$puesto,$role)
    {
        if($categoria == 0){
            $level = '';
        }else if($puesto == 0){
            $level = $categoria.'%';
        }else if($role == 0){
            $level = $categoria.$puesto.'%';
        }else{
            $level = $categoria.$puesto.$role;
        }

        $search = AuthItem::find()->where([
            'type' => 1,
        ])
            ->andFilterWhere(['AND','level like (\'' . $level. '\')'])
            ->all();

        return ArrayHelper::map($search, 'name', 'description');
    }
}
