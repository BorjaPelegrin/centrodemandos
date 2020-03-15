<?php

namespace common\modules\maintenance\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\maintenance\models\Ejercicio;

/**
 * EjercicioSearch represents the model behind the search form about `common\modules\maintenance\models\Ejercicio`.
 */
class EjercicioSearch extends Ejercicio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ejercicio', 'id_zona', 'id_tipo'], 'integer'],
            [['name', 'video', 'file', 'is_archived'], 'safe'],
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
        $query = Ejercicio::find();

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
            'id_ejercicio' => $this->id_ejercicio,
            'id_zona' => $this->id_zona,
            'id_tipo' => $this->id_tipo,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'video', $this->video])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'is_archived', $this->is_archived]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchWith($params)
    {
        $query = Ejercicio::find();
        $query->with('tipo', 'zona');

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
            'id_ejercicio' => $this->id_ejercicio,
            'id_zona' => $this->id_zona,
            'id_tipo' => $this->id_tipo,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'video', $this->video])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'is_archived', $this->is_archived]);

        return $dataProvider;
    }
}
