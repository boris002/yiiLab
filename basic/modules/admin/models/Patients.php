<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Patients extends ActiveRecord
{
    public static function tableName()
    {
        return 'Patients';
    }
    public function getAppointments()
    {
        return $this->hasMany(Appointments::class, ['id_patient' => 'id']);
    }

    public static function getPatientList()
    {
        return ArrayHelper::map(Patients::find()->all(), 'id', 'name');
    }
    public function rules()
    {
        return [
            [['id', 'medical_card_number'], 'integer'],
            [['name', 'date_of_birth', 'address', 'gender'], 'safe'],
            [['discount'], 'number'],
        ];
    }
}