<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CollegeMast;

/**
 * CollegeMastSearch represents the model behind the search form of `frontend\models\CollegeMast`.
 */
class CollegeMastSearch extends CollegeMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['college_code', 'total_students', 'city_code', 'state_code', 'country_code', 'univ_code'], 'integer'],
            [['college_name', 'city_name', 'state_name', 'country_name', 'prospectus'], 'safe'],
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
        $query = CollegeMast::find();

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
            'college_code' => $this->college_code,
            'total_students' => $this->total_students,
            'city_code' => $this->city_code,
            'state_code' => $this->state_code,
            'country_code' => $this->country_code,
            'univ_code' => $this->univ_code,
        ]);

        $query->andFilterWhere(['like', 'college_name', $this->college_name])
            ->andFilterWhere(['like', 'city_name', $this->city_name])
            ->andFilterWhere(['like', 'state_name', $this->state_name])
            ->andFilterWhere(['like', 'country_name', $this->country_name])
            ->andFilterWhere(['like', 'prospectus', $this->prospectus]);

        return $dataProvider;
    }
}
