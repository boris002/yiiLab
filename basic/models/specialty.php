<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;


class specialty extends ActiveRecord
{
    public function getdoctor(){
        $this->hasMany(Doctors::class ,['id_specialty' => 'id']);
    }
    public static function getSpecialtyList()
    {
        $specialties = self::find()->all();
        return ArrayHelper::map($specialties, 'id', 'name');
    }
    public function rules()
    {
        return [
            [['name'], 'safe'],
        ];
    }

}