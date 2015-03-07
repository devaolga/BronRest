<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $phone
 * @property string $email
//  * @property string $password
 * @property string $password write-only password
 * @property string $facebook
 * @property integer $verified
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Bookings[] $bookings
 */
// class User extends \yii\db\ActiveRecord
class User extends ActiveRecord implements IdentityInterface
{
	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
//         return 'user';
    	return '{{%user}}';
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
    	return [
    			TimestampBehavior::className(),
    	];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	['status', 'default', 'value' => self::STATUS_ACTIVE],
        	['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
//             [['username', 'verified', 'password_hash', 'auth_key', 'created_at', 'updated_at'], 'required'],
//             [['verified', 'status', 'created_at', 'updated_at'], 'integer'],
//             [['username', 'phone', 'email', 'password', 'facebook'], 'string', 'max' => 300],
//             [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
//             [['auth_key'], 'string', 'max' => 32]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
    	return static::findOne(['user_id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'phone' => 'Phone',
            'email' => 'Email',
            'password' => 'Password',
            'facebook' => 'Facebook',
            'verified' => 'Verified',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Bookings::className(), ['user_id' => 'user_id']);
    }
    
    /**
    * @inheritdoc
    */
    public static function findIdentityByAccessToken($token, $type = null) {
    	throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
    	return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }
    
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
    	if (!static::isPasswordResetTokenValid($token)) {
    		return null;
    	}
    
    	return static::findOne([
    			'password_reset_token' => $token,
    			'status' => self::STATUS_ACTIVE,
    	]);
    }
    
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
    	if (empty($token)) {
    		return false;
    	}
    	$expire = Yii::$app->params['user.passwordResetTokenExpire'];
    	$parts = explode('_', $token);
    	$timestamp = (int) end($parts);
    	return $timestamp + $expire >= time();
    }
    
    /**
     * @inheritdoc
     */
    public function getId()
    {
    	return $this->getPrimaryKey();
    }
    
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
    	return $this->auth_key;
    }
    
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
    	return $this->getAuthKey() === $authKey;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
    	return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
    	$this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
    	$this->auth_key = Yii::$app->security->generateRandomString();
    }
    
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
    	$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
    	$this->password_reset_token = null;
    }
}
