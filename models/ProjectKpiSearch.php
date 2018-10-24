<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectKpi;

/**
 * ProjectKpiSearch represents the model behind the search form of `app\models\ProjectKpi`.
 */
class ProjectKpiSearch extends ProjectKpi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kpi_id'], 'integer'],
            [['kpi_name', 'kpi_goal', 'kpi_project_key'], 'safe'],
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
        $query = ProjectKpi::find();

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
            'kpi_id' => $this->kpi_id,
        ]);

        $query->andFilterWhere(['like', 'kpi_name', $this->kpi_name])
            ->andFilterWhere(['like', 'kpi_goal', $this->kpi_goal])
            ->andFilterWhere(['like', 'kpi_project_key', $this->kpi_project_key]);

        return $dataProvider;
    }
}
