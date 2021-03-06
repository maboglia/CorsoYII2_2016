<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $id
 * @property integer $floor
 * @property integer $room_number
 * @property integer $has_conditioner
 * @property integer $has_tv
 * @property integer $has_phone
 * @property string $available_from
 * @property string $price_per_day
 * @property string $description
 *
 * @property Reservation[] $reservations
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['floor', 'room_number', 'has_conditioner', 'has_tv', 'has_phone', 'available_from'], 'required'],
            [['floor', 'room_number', 'has_conditioner', 'has_tv', 'has_phone'], 'integer'],
            [['available_from'], 'safe'],
            [['price_per_day'], 'number'],
            [['description'], 'string'],
            ['fileImage', 'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'floor' => 'Piano',
            'room_number' => 'Room Number',
            'has_conditioner' => 'Has Conditioner',
            'has_tv' => 'Has Tv',
            'has_phone' => 'Has Phone',
            'available_from' => 'Available From',
            'price_per_day' => 'Price Per Day',
            'description' => 'Description',
	                    'fileImage' => 'Image'

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['room_id' => 'id']);
    }

	public function getCustomers()
	    {
	            return $this->hasMany(Customer::className(), ['id' => 'customer_id'])->via('reservations');
	    }

    public function getLastReservation()
    {
        return $this->hasOne(
          Reservation::className(),
          ['room_id' => 'id']
          )
          ->orderBy('id');
    }

}