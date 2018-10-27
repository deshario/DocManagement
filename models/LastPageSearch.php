<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LastPage;

/**
 * LastPageSearch represents the model behind the search form of `app\models\LastPage`.
 */
class LastPageSearch extends LastPage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_id', 'last_role'], 'integer'],
            [['last_user', 'last_position', 'project_act_key'], 'safe'],
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
        $query = LastPage::find();

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
            'last_id' => $this->last_id,
            'last_role' => $this->last_role,
        ]);

        $query->andFilterWhere(['like', 'last_user', $this->last_user])
            ->andFilterWhere(['like', 'last_position', $this->last_position])
            ->andFilterWhere(['like', 'project_act_key', $this->project_act_key]);

        return $dataProvider;
    }
}
