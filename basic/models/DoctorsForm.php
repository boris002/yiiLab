<?php

namespace app\models;
use http\Message;
use yii\base\Model;

class DoctorsForm extends Model
{
    public $name;
    public $specialty;
    public $category;

    public function rules()
    {
        return [
            [['name', 'category'], 'required','message'=>"Заполните данное поле"],
            [['name'], 'string', 'max' => 255],
            [['specialty'], 'string', 'max' => 255],
            [['category'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'ФИО',
            'specialty' => 'Специальность',
            'category' => 'Категория',
        ];
    }
}
