<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Element;

/**
 * ElementSearch represents the model behind the search form of `app\models\Element`.
 */
class ElementSearch extends Element
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['element_id'], 'integer'],
            [['element_name'], 'safe'],
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
        $query = Element::find();

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
            'element_id' => $this->element_id,
        ]);

        $query->andFilterWhere(['like', 'element_name', $this->element_name]);

        return $dataProvider;
    }
}
