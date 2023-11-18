<?php



/*class LoginForm extends Model
//
    public $username;
    public $password;
    public $rememberMe = true;
    public $password_hash;


    private $_user = false;


    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            // password_hash should be safe
            ['password_hash', 'safe'],
        ];
    }



    public function validatePassword($password)
    {
        if ($password !== null) {
            return Yii::$app->security->validatePassword($password, $this->password_hash);
        }

        return false; // or handle the case where $password is null
    }



*//*    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();

            // Проверяем, существует ли пользователь и пароль валиден
            if ($user && $user->validatePassword($this->password)) {
                return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
            } else {
                // Обработка случая, когда пароль не соответствует
                $this->addError('password', 'Incorrect password.');
            }
        }

        return false;
    }


    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }/**/
//}

// app\models\User.php

// app\models\LoginForm.php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }


    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }

        return false;
    }



    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
