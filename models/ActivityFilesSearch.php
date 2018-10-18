<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ActivityFiles;

/**
 * ActivityFilesSearch represents the model behind the search form of `app\models\ActivityFiles`.
 */
class ActivityFilesSearch extends ActivityFiles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id'], 'integer'],
            [['file_source'], 'safe'],
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
        $query = ActivityFiles::find();

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
            'file_id' => $this->file_id,
        ]);

        $query->andFilterWhere(['like', 'file_source', $this->file_source]);

        return $dataProvider;
    }
}
