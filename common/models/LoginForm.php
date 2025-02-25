<?php
namespace common\models;

use backend\models\Pengguna;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     * FUNCTION INI JALAN OTOMATIS KARENA DI RULES DIATUR PASSWORD HARUS MENJALANKAN FUNCTION VALIDATEPASSWORD
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            
            $user = $this->getUser();
            // Set password hash
            $user->setPassword($this->password);

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
                //print_r('ada');exit();
            } 
        } else {
            print_r('ada error');exit();
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            // proses login berdasarkan data user yang berada pada model IdentityInterface
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Pengguna::findByUsername($this->username);
        }

        return $this->_user;
    }
}
