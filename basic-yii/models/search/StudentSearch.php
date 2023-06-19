<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Student;

/**
 * StudentSearch represents the model behind the search form of `app\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['HOSV', 'TEN', 'MASV', 'MAKHOA', 'country', 'path', 'fileName'], 'safe'],
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
        $query = Student::find();

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
        $query->andFilterWhere(['like', 'HOSV', $this->HOSV])
            ->andFilterWhere(['like', 'TEN', $this->TEN])
            ->andFilterWhere(['like', 'MASV', $this->MASV])
            ->andFilterWhere(['like', 'MAKHOA', $this->MAKHOA])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'fileName', $this->fileName]);

        return $dataProvider;
    }
}
