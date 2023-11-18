<?php

namespace app\models;
use yii\base\Model;


class patientsForm extends Model
{
    public $medicalCardNumber;
    public $name;
    public $birthday;
    public $address;
    public $gender;
    public $discount;

    public function rules()
    {
        return [
            [['name', 'medicalCardNumber', 'birthday', 'address', 'gender', 'discount'], 'required'],
            [['name', 'address', 'gender'], 'string', 'max' => 255],
            [['medicalCardNumber', 'discount'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'ФИО',
            'medicalCardNumber' => 'Номер медицинской карты',
            'birthday' => 'Дата рождения',
            'address' => 'Адрес',
            'gender' => 'Пол',
            'discount' => 'Скидка',
        ];
    }
}