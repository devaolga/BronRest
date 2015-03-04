<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tables;

/**
 * TablesSearch represents the model behind the search form about `common\models\Tables`.
 */
class TablesSearch extends Tables
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['max_people', 'table_id', 'restaurant_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Tables::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'max_people' => $this->max_people,
            'table_id' => $this->table_id,
            'restaurant_id' => $this->restaurant_id,
        ]);

        return $dataProvider;
    }
}
