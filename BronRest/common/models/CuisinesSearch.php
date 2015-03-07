<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Cuisines;

/**
 * CuisinesSearch represents the model behind the search form about `common\models\Cuisines`.
 */
class CuisinesSearch extends Cuisines
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cuisine_id'], 'integer'],
            [['cuisine'], 'safe'],
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
        $query = Cuisines::find();

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
            'cuisine_id' => $this->cuisine_id,
        ]);

        $query->andFilterWhere(['like', 'cuisine', $this->cuisine]);

        return $dataProvider;
    }
}
