<?php

namespace app\models;
use yii\db\ActiveRecord;
class Basket extends ActiveRecord
{
    public static function tableName()
    {
        return 'Basket';
    }
    public function rules()
    {
    return [
        [['source_table', 'record_data'], 'required'],
        [['record_data'], 'string'],
        [['deleted_at'], 'safe'],
        [['source_table'], 'string', 'max' => 255],
    ];
}

}