<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Restaurants;

/**
 * RestaurantsSearch represents the model behind the search form about `common\models\Restaurants`.
 */
class RestaurantsSearch extends Restaurants
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['restaurant_id', 'cuisine', 'vegetarian', 'wifi', 'max_people'], 'integer'],
            [['name', 'opening_time', 'closing_time', 'country', 'city', 'address', 'website', 'email', 'phone', 'description'], 'safe'],
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
        $query = Restaurants::find();

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
            'restaurant_id' => $this->restaurant_id,
            'opening_time' => $this->opening_time,
            'closing_time' => $this->closing_time,
            'cuisine' => $this->cuisine,
            'vegetarian' => $this->vegetarian,
            'wifi' => $this->wifi,
            'max_people' => $this->max_people,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
