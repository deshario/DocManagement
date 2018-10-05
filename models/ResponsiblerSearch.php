<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Responsibler;

/**
 * ResponsiblerSearch represents the model behind the search form of `app\models\Responsibler`.
 */
class ResponsiblerSearch extends Responsibler
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['responsible_id'], 'integer'],
            [['responsible_by'], 'safe'],
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
        $query = Responsibler::find();

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
            'responsible_id' => $this->responsible_id,
        ]);

        $query->andFilterWhere(['like', 'responsible_by', $this->responsible_by]);

        return $dataProvider;
    }
}
