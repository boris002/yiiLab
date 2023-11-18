<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class users extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }
    public function rules()
    {
        return [
            [['id', 'username', 'password_hash', 'auth_key'], 'safe'],

        ];
    }

}