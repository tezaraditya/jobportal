<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id_admin
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 300],
            [['username', 'authKey'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_admin' => 'Id Admin',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    public function beforeSave($insert) {

          if(isset($this->password))

          $this->password = bin2hex($this->password);
          $this->authKey = sha1($this->username);



          return parent::beforeSave($insert);
    }
}
