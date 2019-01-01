<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Consistency;

/**
 * ConsistencySearch represents the model behind the search form of `app\models\Consistency`.
 */
class ConsistencySearch extends Consistency
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['consistency_id', 'cons_strategic_id', 'cons_goal_id', 'cons_strategy_id', 'cons_indicator_id'], 'integer'],
            [['project_act_key'], 'safe'],
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
        $query = Consistency::find();

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
            'consistency_id' => $this->consistency_id,
            'cons_strategic_id' => $this->cons_strategic_id,
            'cons_goal_id' => $this->cons_goal_id,
            'cons_strategy_id' => $this->cons_strategy_id,
            'cons_indicator_id' => $this->cons_indicator_id,
        ]);

        $query->andFilterWhere(['like', 'project_act_key', $this->project_act_key]);

        return $dataProvider;
    }
}
