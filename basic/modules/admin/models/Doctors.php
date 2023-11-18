<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Doctors extends ActiveRecord
{
    public function rules()
    {
        return [
            [['id', 'id_specialty', 'category'], 'safe'],
            [['name'], 'safe'],


        ];
    }
    public static function tableName()
    {
        return 'Doctors';
    }
    public function getAppointments()
    {
        return $this->hasMany(Appointments::class, ['id_doctor' => 'id']);
    }
    public function getSpecialty(){
        return $this->hasOne(specialty::class,['id'=>'id_specialty']);
    }
    public static function getDoctorList()
    {
        return ArrayHelper::map(Doctors::find()->all(), 'id', 'name');
    }
}