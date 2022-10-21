<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Address;

/**
 * AddressSearch represents the model behind the search form of `app\models\Address`.
 */
class AddressSearch extends Address
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address_id', 'address_type', 'address_person_id'], 'integer'],
            [['address_start_date', 'address_end_date', 'address_city', 'address_state', 'address_details'], 'safe'],
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
        $query = Address::find();

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
            'address_id' => $this->address_id,
            'address_start_date' => $this->address_start_date,
            'address_end_date' => $this->address_end_date,
            'address_type' => $this->address_type,
            'address_person_id' => $this->address_person_id,
        ]);

        $query->andFilterWhere(['like', 'address_city', $this->address_city])
            ->andFilterWhere(['like', 'address_state', $this->address_state])
            ->andFilterWhere(['like', 'address_details', $this->address_details]);

        return $dataProvider;
    }
}
