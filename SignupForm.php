<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $confirmpassword;
    public $phone;
    public $facebook;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        	['password', 'compare', 'compareAttribute'=> 'confirmpassword', 'message'=>"Passwords don't match"],
        		
        	['confirmpassword', 'required'],
        	['confirmpassword', 'string', 'min' => 6],
        	['confirmpassword', 'compare', 'compareAttribute'=> 'password', 'message'=>"Passwords don't match"],
        		
        	['phone', 'required'],
        	['phone', 'string', 'min' => 4],
            
                ['facebook', 'string', 'min' => 4],
            
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
	public function attributeLabels()
	{
        return array(
                'confirmpassword' => 'Re-type password',
        );
        }
        
        /*public function setData($params)
        {
             $this->email = "test";
            
             
        } */
    

    
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();           
            $user->email = $this->email;            
            $user->phone = $this->phone;
            $user->setPassword($this->password);
            $user->phone = $this->phone;
            $user->name = $this->name;
            $user->facebook = $this->facebook;
            //file_put_contents('fb2.txt', print_r($this->facebook,1)); for debug
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
