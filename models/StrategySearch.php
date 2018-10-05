<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Strategy;

/**
 * StrategySearch represents the model behind the search form of `app\models\Strategy`.
 */
class StrategySearch extends Strategy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['strategy_id'], 'integer'],
            [['strategy_name'], 'safe'],
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
        $query = Strategy::find();

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
            'strategy_id' => $this->strategy_id,
        ]);

        $query->andFilterWhere(['like', 'strategy_name', $this->strategy_name]);

        return $dataProvider;
    }
}
