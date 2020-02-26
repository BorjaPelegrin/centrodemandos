<?php

namespace common\modules\admin\queries;

/**
 * This is the ActiveQuery class for [[\common\modules\admin\models\UserLogin]].
 *
 * @see \common\modules\admin\models\UserLogin
 */
class UserLoginQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\modules\admin\models\UserLogin[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\modules\admin\models\UserLogin|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
