<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Offenses;

/**
 * OffensesSearch represents the model behind the search form of `app\models\Offenses`.
 */
class OffensesSearch extends Offenses
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['offense_id', 'offense_type'], 'integer'],
            [['offense_name', 'offense_desc'], 'safe'],
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
        $query = Offenses::find();

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
            'offense_id' => $this->offense_id,
            'offense_type' => $this->offense_type,
        ]);

        $query->andFilterWhere(['like', 'offense_name', $this->offense_name])
            ->andFilterWhere(['like', 'offense_desc', $this->offense_desc]);

        return $dataProvider;
    }
}
