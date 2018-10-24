<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form of `app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activity_id', 'root_project_id', 'organization_organization_id', 'strategic_strategic_id', 'goal_goal_id', 'responsible_by', 'strategy_strategy_id', 'indicator_indicator_id', 'realted_subject_id', 'element_element_id', 'product_product_id', 'project_laksana_id', 'project_paomai_id', 'project_plan_id', 'budget_type_id', 'activity_money', 'budget_details_id', 'activity_status'], 'integer'],
            [['activity_name', 'activity_rationale', 'activity_type', 'objective', 'evaluation', 'benefit','activity_key'], 'safe'],
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
        $query = Activity::find();

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
            'activity_id' => $this->activity_id,
            'root_project_id' => $this->root_project_id,
            'organization_organization_id' => $this->organization_organization_id,
            'strategic_strategic_id' => $this->strategic_strategic_id,
            'goal_goal_id' => $this->goal_goal_id,
            'responsible_by' => $this->responsible_by,
            'strategy_strategy_id' => $this->strategy_strategy_id,
            'indicator_indicator_id' => $this->indicator_indicator_id,
            'realted_subject_id' => $this->realted_subject_id,
            'element_element_id' => $this->element_element_id,
            'product_product_id' => $this->product_product_id,
            'project_laksana_id' => $this->project_laksana_id,
            'project_paomai_id' => $this->project_paomai_id,
            'project_plan_id' => $this->project_plan_id,
            'budget_type_id' => $this->budget_type_id,
            'activity_money' => $this->activity_money,
            'budget_details_id' => $this->budget_details_id,
            'activity_status' => $this->activity_status,
        ]);

        $query->andFilterWhere(['like', 'activity_name', $this->activity_name])
            ->andFilterWhere(['like', 'activity_rationale', $this->activity_rationale])
            ->andFilterWhere(['like', 'activity_type', $this->activity_type])
            ->andFilterWhere(['like', 'objective', $this->objective])
            ->andFilterWhere(['like', 'evaluation', $this->evaluation])
            ->andFilterWhere(['like', 'benefit', $this->benefit])
            ->andFilterWhere(['like', 'activity_key', $this->activity_key]);

        return $dataProvider;
    }
}
