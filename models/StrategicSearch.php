<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Strategic;

/**
 * StrategicSearch represents the model behind the search form of `app\models\Strategic`.
 */
class StrategicSearch extends Strategic
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['strategic_id'], 'integer'],
            [['strategic_name'], 'safe'],
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
        $query = Strategic::find();

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
            'strategic_id' => $this->strategic_id,
        ]);

        $query->andFilterWhere(['like', 'strategic_name', $this->strategic_name]);

        return $dataProvider;
    }
}
