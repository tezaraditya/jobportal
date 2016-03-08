<?php

namespace app\models;

use app\models\Admin;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id_admin;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;



        /**
         * @inheritdoc
         */
        public static function findIdentity($id_admin)
        {
            $TableUsers = Admin::find()->where(["id_admin"=>$id_admin])->one();

    		if(!count($TableUsers)) {

    			return null;
    		}

    		return new static($TableUsers);
        }

        /**
         * @inheritdoc
         */
        public static function findIdentityByAccessToken($token, $type = null)
        {
          $TableUsers = Admin::find()->where(["accessToken"=>$token])->one();

    		if(!count($TableUsers)) {

    			return null;
    		}

    		return new static($TableUsers);
        }

        /**
         * Finds user by username
         *
         * @param  string      $username
         * @return static|null
         */
        public static function findByUsername($username)
        {
          $TableUsers = Admin::find()->where(["username"=>$username])->one();

    		if(!count($TableUsers)) {

    			return null;
    		}

    		return new static($TableUsers);
        }

        /**
         * @inheritdoc
         */
        public function getId()
        {
            return $this->id_admin;
        }

        /**
         * @inheritdoc
         */
        public function getAuthKey()
        {
            return $this->authKey;
        }

        /**
         * @inheritdoc
         */
        public function validateAuthKey($authKey)
        {
            return $this->authKey === $authKey;
        }

        /**
         * Validates password
         *
         * @param  string  $password password to validate
         * @return boolean if password provided is valid for current user
         */
        public function validatePassword($password)
        {
            return $this->password === bin2hex($password);
        }



}
