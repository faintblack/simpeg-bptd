<?php
namespace frontend\models;

use backend\models\Pengguna;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\backend\models\Pengguna', 'targetAttribute' => ['username'] , 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
                
        $user = new Pengguna();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save(null) ? $user : null;
    }
}
