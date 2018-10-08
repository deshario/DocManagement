<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectLaksana;

/**
 * ProjectLaksanaSearch represents the model behind the search form of `app\models\ProjectLaksana`.
 */
class ProjectLaksanaSearch extends ProjectLaksana
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['laksana_id', 'project_type_id', 'procced_id'], 'integer'],
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
        $query = ProjectLaksana::find();

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
            'laksana_id' => $this->laksana_id,
            'project_type_id' => $this->project_type_id,
            'procced_id' => $this->procced_id,
        ]);

        return $dataProvider;
    }
}
