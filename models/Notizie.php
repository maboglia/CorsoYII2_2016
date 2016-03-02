<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notizie".
 *
 * @property integer $id
 * @property string $titolo
 * @property string $testo
 * @property string $data
 */
class Notizie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notizie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titolo', 'testo'], 'required'],
            [['testo'], 'string'],
            [['data'], 'safe'],
            [['titolo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titolo' => 'Titolo',
            'testo' => 'Testo',
            'data' => 'Data',
        ];
    }
}
