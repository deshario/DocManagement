<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BudgetDetails;

/**
 * BudgetDetailsSearch represents the model behind the search form of `app\models\BudgetDetails`.
 */
class BudgetDetailsSearch extends BudgetDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detail_id', 'detail_price'], 'integer'],
            [['detail_name', 'activity_key'], 'safe'],
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
        $query = BudgetDetails::find();

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
            'detail_id' => $this->detail_id,
            'detail_price' => $this->detail_price,
        ]);

        $query->andFilterWhere(['like', 'detail_name', $this->detail_name])
            ->andFilterWhere(['like', 'activity_key', $this->activity_key]);

        return $dataProvider;
    }
}
