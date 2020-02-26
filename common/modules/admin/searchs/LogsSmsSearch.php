<?php

namespace common\modules\admin\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\core\models\generic\LogsSms;

/**
 * LogsSmsSearch represents the model behind the search form of `common\modules\core\models\generic\LogsSms`.
 */
class LogsSmsSearch extends LogsSms
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'area_id', 'created_user_id'], 'integer'],
            [['phone', 'message', 'service', 'result', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = LogsSms::find();

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
            'id' => $this->id,
            'area_id' => $this->area_id,
            'created_at' => $this->created_at,
            'created_user_id' => $this->created_user_id,
        ]);

        $query->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'service', $this->service])
            ->andFilterWhere(['like', 'result', $this->result]);

        return $dataProvider;
    }
}
