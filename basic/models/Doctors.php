<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Doctors extends ActiveRecord
{
    public $patientName;
    public $errorMessage;
    public $result;
    public function getAppointments()
    {
        return $this->hasMany(Appointments::class, ['id_doctor' => 'id']);
    }
    public function getSpecialty(){
        return $this->hasOne(specialty::class,['id'=>'id_specialty']);
    }
    public function FindDoctors()
    {
        $this->result = Doctors::find()
            ->select(['doctors.name'])
            ->innerJoinWith('appointments.patient')
            ->where(['Patients.id' => $this->patientName])
            ->groupBy('id_doctor')
            ->all();
        if (empty($this->result)) {
            $this->errorMessage = "Запрос пустой или данных не найдено.";
        }
        return $this->result;
    }
    public function rules()
    {
        return [
            [['name', 'category','id_specialty','patientName'], 'safe'],
            [['name'], 'match', 'pattern' => '/^[А-Я][а-я]+ [А-Я][а-я]+ [А-Я][а-я]+$/u', 'message' => 'Введите ФИО в формате "Иванов Иван Иванович"'],
            [['category'],'integer','max' => 3, 'min' => 1,'message'=>'Введите число от 1 до 3']

        ];
    }

    public static function tableName()
    {
        return 'Doctors';
    }

    public static function getDoctorList()
    {
        return ArrayHelper::map(Doctors::find()->all(), 'id', 'name');
    }

}


