<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BudgetType;

/**
 * BudgetTypeSearch represents the model behind the search form of `app\models\BudgetType`.
 */
class BudgetTypeSearch extends BudgetType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['budget_type_id'], 'integer'],
            [['budget_type_name'], 'safe'],
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
        $query = BudgetType::find();

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
            'budget_type_id' => $this->budget_type_id,
        ]);

        $query->andFilterWhere(['like', 'budget_type_name', $this->budget_type_name]);

        return $dataProvider;
    }
}
