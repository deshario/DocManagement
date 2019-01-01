<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `app\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'organization_id', 'responsibler_id', 'project_laksana_id', 'element_id', 'product_id', 'project_kpi_id', 'projecti_paomai_id', 'project_plan_id', 'created_by', 'project_money', 'budget_budget_type', 'project_status', 'lastpage_id'], 'integer'],
            [['project_name', 'rationale', 'objective', 'lakshana_activity', 'project_duration', 'project_location', 'project_evaluation', 'project_benefit', 'project_year', 'project_key','suggestion'], 'safe'],
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
        $query = Project::find();

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
            'project_id' => $this->project_id,
            'organization_id' => $this->organization_id,
            'responsibler_id' => $this->responsibler_id,
            'project_laksana_id' => $this->project_laksana_id, 
            'element_id' => $this->element_id,
            'product_id' => $this->product_id,
            'project_kpi_id' => $this->project_kpi_id,
            'projecti_paomai_id' => $this->projecti_paomai_id,
            'project_plan_id' => $this->project_plan_id,
            'created_by' => $this->created_by,
            'project_money' => $this->project_money,
            'budget_budget_type' => $this->budget_budget_type,
            'project_year' => $this->project_year,
            'project_status' => $this->project_status,
            'lastpage_id' => $this->lastpage_id,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'rationale', $this->rationale])
            ->andFilterWhere(['like', 'objective', $this->objective])
            ->andFilterWhere(['like', 'lakshana_activity', $this->lakshana_activity])
            ->andFilterWhere(['like', 'project_start', $this->project_start])
            ->andFilterWhere(['like', 'project_end', $this->project_end])
            ->andFilterWhere(['like', 'project_location', $this->project_location])
            ->andFilterWhere(['like', 'project_evaluation', $this->project_evaluation])
            ->andFilterWhere(['like', 'project_benefit', $this->project_benefit])
            ->andFilterWhere(['like', 'project_key', $this->project_key])
            ->andFilterWhere(['like', 'suggestion', $this->suggestion]);

        return $dataProvider;
    }
}