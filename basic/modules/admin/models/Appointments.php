<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class Appointments extends ActiveRecord
{
    public static function tableName()
    {
        return 'Appointments';
    }
    public function rules()
    {
        return [
            [['id', 'id_doctor', 'id_patient', 'id_diagnose'], 'safe'],
            [['visit_date', 'visit_purpose'], 'safe'],
            [['visit_price'], 'number'],
        ];
    }
    public function getdoctor()
    {
        return $this->hasOne(Doctors::class, ['id' => 'id_doctor']);
    }
    public function getpatient(){
        return $this->hasOne(Patients::class,['id' =>'id_patient']);
    }
    public function getdiagnose(){
        return $this->hasOne(Diagnoses::class,['id'=>'id_diagnose']);
    }

}