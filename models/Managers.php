<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "managers".
 *
 * @property int $id
 * @property string $username Username
 * @property string $auth_key Authentication Key
 * @property string $password_hash Password Hash
 * @property string $password_reset_token Password Reset Token
 * @property string $email Email
 * @property int $status Status
 * @property int $roles Roles
 * @property int $created_at Created At
 * @property int $updated_at Updated At
 * @property string $manager_key
 * @property int $worked_at Work At Branch
 *
 */

class Managers extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */

    const STATUS_DELETED = 0;
    const STATUS_WAITING = 5;
    const STATUS_ACTIVE = 10;

    const ROLE_USER = 10;
    const ROLE_ADMIN = 20;

    public static function tableName()
    {
        return 'managers';
    }

    public $strStatus = [
        self::STATUS_DELETED => 'Deactivated',
        self::STATUS_ACTIVE => 'Activated',
        self::STATUS_WAITING => 'UnConfirmed'
    ];

    public function getStatus($status = null){
        if($status === null){
            return Yii::t('app',$this->strStatus[$this->status]);
        }
        return Yii::t('app',$this->strStatus[$status]);
    }

    public $strRoles = [
        self::ROLE_USER => 'User',
        self::ROLE_ADMIN => 'Administrator'
    ];

    public function getRoles($roles = null){
        if($roles === null){
            return Yii::t('app',$this->strRoles[$this->roles]);
        }
        return Yii::t('app',$this->strRoles[$roles]);
    }

    public $password;

    public function rules()
    {
        return [

            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_WAITING, self::STATUS_DELETED]],

            ['roles', 'default', 'value' => self::ROLE_USER],
            ['roles', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN]],

            [['username', 'email',], 'required'],
            [['status', 'roles', 'created_at', 'updated_at'], 'integer'],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'string', 'max' => 8],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],

            //['worked_at', 'required'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'roles' => 'Roles',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getLabeledStatus($status){
        if($status == Managers::STATUS_WAITING){
            return "<h4><span class='label label-warning'><i class='fa fa-refresh fa-spin'></i> Waiting</span></h4>";
        }elseif ($status == Managers::STATUS_ACTIVE){
            return "<h4><span class='label label-success'><i class='fa fa-check'></i> Activated</span></h4>";
        }else{ // DELETED
            return "<h4><span class='label label-danger'><i class='fa fa-close'></i> Deactivated</span></h4>";
        }
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function hashPassword($password) {
        return Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function getRandomKey($length){
        return Yii::$app->getSecurity()->generateRandomString($length);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => [self::STATUS_ACTIVE,self::STATUS_WAITING,self::STATUS_DELETED]]);
        //return static::findOne(['username' => $username, 'status' => self::STATUS_WAITING]);
    }

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

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getToggleItems()
    {
        // custom array for toggle update
        return  [
            'on' => ['value'=>1, 'label'=>'Publish'],
            'off' => ['value'=>0, 'label'=>'Panding'],
        ];
    }

}
