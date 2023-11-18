<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Diagnoses extends ActiveRecord
{
    public function getAppointments()
    {
        return $this->hasMany(Appointments::class, ['id_diagnose' => 'id']);
    }
    public static function getDiagnosesList()
    {
        return ArrayHelper::map(Diagnoses::find()->all(), 'id', 'name');
    }
    public static function tableName()
    {
        return 'Diagnoses';
    }
    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }
}