<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "backendusers".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $gender
 * @property string $country
 * @property string $email
 */
class Backendusers extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $captcha;
    public $password_repeat;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'backendusers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'country', 'email','captcha','password_repeat'], 'required'],
            [['username', 'password', 'country', 'email','gender'], 'string', 'max' => 50],
            ['captcha', 'captcha'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'country' => 'Country',
            'gender' => 'Gender',
            'email' => 'E-mail',
        ];
    }

     /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // return static::findOne(['access_token' => $token]);
        throw new \yii\base\NotSupportedException();
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        throw new \yii\base\NotSupportedException();
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
         throw new \yii\base\NotSupportedException();
    }

    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }

    public function validatePassword($password){
        return $this->password ===$password;
    }
} // end class
