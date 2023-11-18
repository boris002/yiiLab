<?php

namespace app\models;
use yii\base\Model;


class DiagnosesForm extends Model
{
    public $name;


    public function rules()
    {
        return [
            [['name', ], 'required'],
            [['name'], 'string', 'max' => 255],

        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Диагноз',

        ];
    }
}