<?php

namespace common\modules\media\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\media\models\Media;

/**
 * MediaSearch represents the model behind the search form about `common\modules\media\models\Media`.
 */
class MediaSearch extends Media
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_media', 'associated_id', 'id_media_type', 'id_mime_type'], 'integer'],
            [['associated_tb', 'source', 'name', 'date', 'is_archived', 'archived_date'], 'safe'],
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
        $query = Media::find();

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
            'id_media' => $this->id_media,
            'associated_id' => $this->associated_id,
            'id_media_type' => $this->id_media_type,
            'id_mime_type' => $this->id_mime_type,
            'date' => $this->date,
            'archived_date' => $this->archived_date,
        ]);

        $query->andFilterWhere(['like', 'associated_tb', $this->associated_tb])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'is_archived', $this->is_archived]);

        return $dataProvider;
    }
}
