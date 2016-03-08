<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JobFunction;

/**
 * JobFunctionSearch represents the model behind the search form about `app\models\JobFunction`.
 */
class JobFunctionSearch extends JobFunction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_job_function'], 'integer'],
            [['function'], 'safe'],
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
        $query = JobFunction::find();

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
            'id_job_function' => $this->id_job_function,
        ]);

        $query->andFilterWhere(['like', 'function', $this->function]);

        return $dataProvider;
    }
}
