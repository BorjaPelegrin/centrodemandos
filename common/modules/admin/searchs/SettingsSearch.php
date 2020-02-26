<?php

namespace common\modules\admin\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\admin\models\Settings;

/**
 * SettingsSearch represents the model behind the search form about `common\modules\admin\models\Settings`.
 */
class SettingsSearch extends Settings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_setting', 'associated_id'], 'integer'],
            [['description', 'associated_tb', 'type', 'value', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Settings::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_setting' => $this->id_setting,
            'associated_id' => $this->associated_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'associated_tb', $this->associated_tb])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
