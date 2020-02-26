<?php

namespace common\modules\admin\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\admin\models\Groups;

/**
 * GroupsSearch represents the model behind the search form of `common\modules\admin\models\Groups`.
 */
class GroupsSearch extends Groups
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_group', 'id_group_parent', 'id_employee', 'created_by', 'updated_by'], 'integer'],
            [['name', 'description', 'id_clinic', 'clinic_excluded', 'id_area', 'associated_tb', 'is_archived', 'date_start', 'date_end', 'created_at', 'updated_at'], 'safe'],
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
        $query = Groups::find();

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
            'id_group' => $this->id_group,
            'id_group_parent' => $this->id_group_parent,
            'id_employee' => $this->id_employee,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
            'associated_tb' => $this->associated_tb,
            'is_archived' => $this->is_archived,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'id_clinic', $this->id_clinic])
            ->andFilterWhere(['like', 'clinic_excluded', $this->clinic_excluded])
            ->andFilterWhere(['like', 'id_area', $this->id_area]);

        if($this->date_start){
            $query->andWhere(['or',
                ['<=', 'date_start',date('Y-m-d', strtotime($this->date_start))],
                ['date_start'=>null],
            ]);
        }
        if($this->date_end){
            $query->andWhere(['or',
                ['>=', 'date_end',date('Y-m-d 23:59:59', strtotime($this->date_start))],
                ['date_end'=>null],
            ]);
        }


        return $dataProvider;
    }
}
