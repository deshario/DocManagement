<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ElementProduct;

/**
 * ElementProductSearch represents the model behind the search form of `app\models\ElementProduct`.
 */
class ElementProductSearch extends ElementProduct
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['element_product_id', 'ep_element_id', 'ep_product_id'], 'integer'],
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
        $query = ElementProduct::find();

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
            'element_product_id' => $this->element_product_id,
            'ep_element_id' => $this->ep_element_id,
            'ep_product_id' => $this->ep_product_id,
        ]);

        $query->andFilterWhere(['like', 'project_act_key', $this->project_act_key]);

        return $dataProvider;
    }
}
