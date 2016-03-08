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

    public $query;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_career'], 'integer'],
            [['position', 'query','company', 'email', 'location', 'salary_min', 'salary_max', 'function', 'experience', 'education', 'requirements', 'responsibilities', 'created_date'], 'safe'],
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
        $query = Career::find()->where(['company'=> Yii::$app->user->identity->company]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['created_date' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }



        $query->orFilterWhere(['like', 'id_career', $this->query])
            ->orFilterWhere(['like', 'created_date', $this->query])
            ->orFilterWhere(['like', 'position', $this->query])
            ->orFilterWhere(['like', 'company', $this->query])
            ->orFilterWhere(['like', 'email', $this->query])
            ->orFilterWhere(['like', 'location', $this->query])
            ->orFilterWhere(['like', 'salary_min', $this->query])
            ->orFilterWhere(['like', 'salary_max', $this->query])
            ->orFilterWhere(['like', 'function', $this->query])
            ->orFilterWhere(['like', 'experience', $this->query])
            ->orFilterWhere(['like', 'education', $this->query]);

        return $dataProvider;
    }
}
