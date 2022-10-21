<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CriminalRecord;

/**
 * CriminalRecordSearch represents the model behind the search form of `app\models\CriminalRecord`.
 */
class CriminalRecordSearch extends CriminalRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['record_id', 'curr_status', 'alert_flag', 'record_offense_id', 'record_conviction_id', 'record_person_id'], 'integer'],
            [['record_num', 'conviction_date', 'conviction_place'], 'safe'],
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
        $query = CriminalRecord::find();

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
            'record_id' => $this->record_id,
            'conviction_date' => $this->conviction_date,
            'curr_status' => $this->curr_status,
            'alert_flag' => $this->alert_flag,
            'record_offense_id' => $this->record_offense_id,
            'record_conviction_id' => $this->record_conviction_id,
            'record_person_id' => $this->record_person_id,
        ]);

        $query->andFilterWhere(['like', 'record_num', $this->record_num])
            ->andFilterWhere(['like', 'conviction_place', $this->conviction_place]);

        return $dataProvider;
    }
}
