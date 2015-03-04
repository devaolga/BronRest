<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "restaurants".
 *
 * @property integer $restaurant_id
 * @property string $name
 * @property string $opening_time
 * @property string $closing_time
 * @property string $country
 * @property string $city
 * @property string $address
 * @property integer $cuisine
 * @property integer $vegetarian
 * @property integer $wifi
 * @property integer $max_people
 * @property string $website
 * @property string $email
 * @property string $phone
 * @property string $description
 *
 * @property Cuisines $cuisine0
 * @property Tables[] $tables
 */
class Restaurants extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restaurants';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'country', 'city', 'address', 'email', 'phone'], 'required'],
            [['opening_time', 'closing_time'], 'safe'],
            [['cuisine', 'vegetarian', 'wifi', 'max_people'], 'integer'],
            [['name', 'country', 'city', 'address', 'email'], 'string', 'max' => 200],
            [['website', 'phone'], 'string', 'max' => 300],
            [['description'], 'string', 'max' => 20000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'restaurant_id' => 'Restaurant ID',
            'name' => 'Name',
            'opening_time' => 'Opening Time',
            'closing_time' => 'Closing Time',
            'country' => 'Country',
            'city' => 'City',
            'address' => 'Address',
            'cuisine' => 'Cuisine',
            'vegetarian' => 'Vegetarian',
            'wifi' => 'Wifi',
            'max_people' => 'Max People',
            'website' => 'Website',
            'email' => 'Email',
            'phone' => 'Phone',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuisine0()
    {
        return $this->hasOne(Cuisines::className(), ['cuisine_id' => 'cuisine']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTables()
    {
        return $this->hasMany(Tables::className(), ['restaurant_id' => 'restaurant_id']);
    }
}
