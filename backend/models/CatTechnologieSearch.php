<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CatTechnologie;

/**
 * CatTechnologieSearch represents the model behind the search form of `common\models\CatTechnologie`.
 */
class CatTechnologieSearch extends CatTechnologie
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tec_id'], 'integer'],
            [['tec_name'], 'safe'],
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
        $query = CatTechnologie::find();

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
            'tec_id' => $this->tec_id,
        ]);

        $query->andFilterWhere(['like', 'tec_name', $this->tec_name]);

        return $dataProvider;
    }
}
