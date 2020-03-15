<?php

namespace common\modules\maintenance\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\maintenance\models\Zona;

/**
 * ZonaSearch represents the model behind the search form about `common\modules\maintenance\models\Zona`.
 */
class ZonaSearch extends Zona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_zona'], 'integer'],
            [['name', 'is_archived'], 'safe'],
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
        $query = Zona::find();

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
            'id_zona' => $this->id_zona,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'is_archived', $this->is_archived]);

        return $dataProvider;
    }
}
