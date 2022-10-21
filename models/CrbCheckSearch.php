<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CrbCheck;

/**
 * CrbCheckSearch represents the model behind the search form of `app\models\CrbCheck`.
 */
class CrbCheckSearch extends CrbCheck
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quiery_id', 'query_type_id', 'user_user_id'], 'integer'],
            [['search_firstname', 'search_middlename', 'search_lastname', 'start_date', 'end_date', 'dob', 'search_city', 'search_timestamp'], 'safe'],
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
        $query = CrbCheck::find();

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
            'quiery_id' => $this->quiery_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'dob' => $this->dob,
            'search_timestamp' => $this->search_timestamp,
            'query_type_id' => $this->query_type_id,
            'user_user_id' => $this->user_user_id,
        ]);

        $query->andFilterWhere(['like', 'search_firstname', $this->search_firstname])
            ->andFilterWhere(['like', 'search_middlename', $this->search_middlename])
            ->andFilterWhere(['like', 'search_lastname', $this->search_lastname])
            ->andFilterWhere(['like', 'search_city', $this->search_city]);

        return $dataProvider;
    }
}
