<?php

namespace app\models;
use yii\db\ActiveRecord;
class Appointments extends ActiveRecord
{
    public $doctorName;
    public $result;
    public $year;
    public $errorMessage;
    public $patient1Name;
    public $patient2Name;
    public function CountAppointmentsByDoctor($doctorName)
    {
         $this->result = self::find()
                ->joinWith('doctor')
                ->where(['doctors.id' => $doctorName])
                ->count();
        if (empty($this->result)) {
            $this->errorMessage = "Запрос пустой или данных не найдено.";
        }
        return $this->result;
    }


    public function CountAppointmentsByDoctorInYear($doctorName,$year){
        $this->result = self::find()
            ->innerjoinWith('doctor')
            ->where([
                'doctors.id' => $doctorName,
                'YEAR(visit_date)' => $year
            ])
            ->count();
        if (empty($this->result)) {
            $this->errorMessage = "Запрос пустой или данных не найдено.";
        }
        return $this->result;
    }
    public function TotalCost() {
        $total = Appointments::find()
            ->innerjoinWith('patient')
            ->where(['or', ['patients.id' => $this->patient1Name], ['patients.id' => $this->patient2Name]])
            ->sum('visit_price * (1 - patients.discount)');
        $this->result = round($total, 2);

        if (empty($this->result)) {
            $this->errorMessage = "Запрос пустой или данных не найдено.";
        }
        return $this->result;
    }

    public static function tableName()
    {
        return 'Appointments';
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
    public function rules()
    {
        return [
            [['id_doctor', 'id_patient','visit_date','visit_purpose','visit_price','id_diagnose','doctorName','year','patient1Name', 'patient2Name'], 'safe'],
            [['year'],'integer'],
            [['visit_price'],'double'],

        ];
    }

}