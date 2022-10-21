<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Convictions;

/**
 * ConvictionsSearch represents the model behind the search form of `app\models\Convictions`.
 */
class ConvictionsSearch extends Convictions
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['conviction_id', 'conviction_type'], 'integer'],
            [['conviction_name', 'conviction_desc'], 'safe'],
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
        $query = Convictions::find();

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
            'conviction_id' => $this->conviction_id,
            'conviction_type' => $this->conviction_type,
        ]);

        $query->andFilterWhere(['like', 'conviction_name', $this->conviction_name])
            ->andFilterWhere(['like', 'conviction_desc', $this->conviction_desc]);

        return $dataProvider;
    }
}
