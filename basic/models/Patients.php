<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Patients extends ActiveRecord
{
    public $startYear;
    public $endYear;
    public $result;
    public $errorMessage;

    public function getAppointments()
    {
        return $this->hasMany(Appointments::class, ['id_patient' => 'id']);
    }
    public function rules()
    {
        return [
            [['medical_card_number', 'name', 'date_of_birth', 'address', 'gender', 'discount','startYear', 'endYear'], 'safe'],
            [['name'], 'match', 'pattern' => '/^[А-Я][а-я]+ [А-Я][а-я]+ [А-Я][а-я]+$/u', 'message' => 'Введите ФИО в формате "Иванов Иван Иванович"'],
        ];
    }
    public function search()
    {
        $startDate = $this->startYear . "-01-01";
        $endDate = $this->endYear . "-12-31";

        $this->result = Patients::find()
            ->where(['between', 'date_of_birth', $startDate, $endDate])
            ->all();
        if (empty($this->result)) {
            $this->errorMessage = "Запрос пустой или данных не найдено.";
        }
        return $this->result;
    }
    public static function getPatientList()
    {
        return ArrayHelper::map(Patients::find()->all(), 'id', 'name');
    }

}
