<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tables".
 *
 * @property integer $max_people
 * @property integer $table_id
 * @property integer $restaurant_id
 *
 * @property Bookings[] $bookings
 * @property Restaurants $restaurant
 */
class Tables extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tables';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['max_people', 'table_id', 'restaurant_id'], 'integer'],
            [['table_id', 'restaurant_id'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'max_people' => 'Max People',
            'table_id' => 'Table ID',
            'restaurant_id' => 'Restaurant ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Bookings::className(), ['table_id' => 'table_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurant()
    {
        return $this->hasOne(Restaurants::className(), ['restaurant_id' => 'restaurant_id']);
    }
}
