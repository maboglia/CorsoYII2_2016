<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "areeSosta".
 *
 * @property integer $id
 * @property string $nomeArea
 * @property string $descrizione
 * @property string $comune
 * @property string $latitudine
 * @property string $longitudine
 */
class AreeSosta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'areeSosta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomeArea', 'descrizione', 'comune', 'latitudine', 'longitudine'], 'required'],
            [['descrizione'], 'string'],
            [['latitudine', 'longitudine'], 'number'],
            [['nomeArea'], 'string', 'max' => 255],
            [['comune'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomeArea' => 'Nome Area',
            'descrizione' => 'Descrizione breve',
            'comune' => 'Comune',
            'latitudine' => 'Latitudine',
            'longitudine' => 'Longitudine',
        ];
    }
}
