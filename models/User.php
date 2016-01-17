<?php

namespace app\models;


use app\models\Users as TUsers;


class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id_user;
    public $fullname;
    public $birthplace;
    public $birthdate;
    public $religion;
    public $gender;
    public $marital_status;
    public $nationaly;
    public $height;
    public $weight;
    public $identity_address;
    public $postal_code;
    public $domicile_address;
    public $domicile_postal_code;
    public $phone;
    public $email;
    public $password;
    public $authKey;
    public $accessToken;
    public $join_date;
    public $active;



    /**
     * @inheritdoc
     */
    public static function findIdentity($id_user)
    {
        $TableUsers = TUsers::find()->where(["id_user"=>$id_user])->one();

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
      $TableUsers = TUsers::find()->where(["accessToken"=>$token])->one();

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
    public static function findByUsername($email)
    {
      $TableUsers = TUsers::find()->where(["email"=>$email,'active'=>'y'])->one();

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
        return $this->id_user;
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
