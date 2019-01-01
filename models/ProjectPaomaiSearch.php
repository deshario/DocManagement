<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectPaomai;

/**
 * ProjectPaomaiSearch represents the model behind the search form of `app\models\ProjectPaomai`.
 */
class ProjectPaomaiSearch extends ProjectPaomai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paomai_id'], 'integer'],
            [['project_quantity', 'project_quality', 'project_time'], 'safe'],
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
        $query = ProjectPaomai::find();

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
            'paomai_id' => $this->paomai_id,
        ]);

        $query->andFilterWhere(['like', 'project_quantity', $this->project_quantity])
            ->andFilterWhere(['like', 'project_quality', $this->project_quality])
            ->andFilterWhere(['like', 'project_time', $this->project_time]);

        return $dataProvider;
    }
}
