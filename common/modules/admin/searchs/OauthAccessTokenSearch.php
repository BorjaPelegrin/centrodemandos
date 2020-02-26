<?php

namespace common\modules\admin\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\admin\models\OauthAccessToken;

/**
 * OauthAccessTokenSearch represents the model behind the search form of `common\modules\admin\models\OauthAccessToken`.
 */
class OauthAccessTokenSearch extends OauthAccessToken
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_oauth_access_token', 'id_area', 'expires_in', 'created'], 'integer'],
            [['alias', 'scope', 'access_token', 'refresh_token'], 'safe'],
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
        $query = OauthAccessToken::find();

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
            'id_oauth_access_token' => $this->id_oauth_access_token,
            'id_area' => $this->id_area,
            'expires_in' => $this->expires_in,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'scope', $this->scope])
            ->andFilterWhere(['like', 'access_token', $this->access_token])
            ->andFilterWhere(['like', 'refresh_token', $this->refresh_token]);

        return $dataProvider;
    }
}
