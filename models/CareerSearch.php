<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Career;

/**
 * CareerSearch represents the model behind the search form about `app\models\Career`.
 */
class CareerSearch extends Career
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_career'], 'integer'],
            [['position', 'company', 'email', 'location', 'salary_min', 'salary_max', 'function', 'level', 'experience', 'education', 'degree', 'requirements', 'responsibilities','expired_date'], 'safe'],
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
        $query = Career::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_career' => $this->id_career,
        ]);

        $query->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'salary_min', $this->salary_min])
            ->andFilterWhere(['like', 'salary_max', $this->salary_max])
            ->andFilterWhere(['like', 'function', $this->function])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'experience', $this->experience])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'degree', $this->degree])
            ->andFilterWhere(['like', 'requirements', $this->requirements])
            ->andFilterWhere(['like', 'responsibilities', $this->responsibilities])
            ->andFilterWhere(['like','expired_date', $this->expired_date]);

        return $dataProvider;
    }
}
