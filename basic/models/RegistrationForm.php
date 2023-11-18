<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegistrationForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;
    public $email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password', 'password_repeat', ], 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
           // ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
           // ['email', 'email'],
            ['password', 'compare'],
            ['password', 'string', 'min' => 5],
            ['password', 'match', 'pattern' => '/[A-Z]/', 'message' => 'Пароль должен содержать хотя бы одну большую букву'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->setAttribute('username', $this->username);
        //$user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if ($user->save()) {
            return true;
        } else {
            var_dump($user->getErrors());
            return false;
        }


    }
}
