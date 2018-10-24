<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectPlan;

/**
 * ProjectPlanSearch represents the model behind the search form of `app\models\ProjectPlan`.
 */
class ProjectPlanSearch extends ProjectPlan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_id', 'plan_process'], 'integer'],
            [['plan_detail', 'plan_date', 'plan_place', 'plan_project_key'], 'safe'],
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
        $query = ProjectPlan::find();

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
            'plan_id' => $this->plan_id,
            'plan_process' => $this->plan_process,
            'plan_date' => $this->plan_date,
        ]);

        $query->andFilterWhere(['like', 'plan_detail', $this->plan_detail])
            ->andFilterWhere(['like', 'plan_place', $this->plan_place])
            ->andFilterWhere(['like', 'plan_project_key', $this->plan_project_key]);

        return $dataProvider;
    }
}
