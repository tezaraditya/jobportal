<?php

namespace app\models;

use app\models\Company as TUsers;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
  public $id_company;
  public $company;
  public $about;
  public $address;
  public $city;
  public $province;
  public $postal_code;
  public $email;
  public $phone;
  public $password;
  public $authKey;
  public $accessToken;
  public $join_date;



    /**
     * @inheritdoc
     */
    public static function findIdentity($id_company)
    {
      $TableUsers = TUsers::find()->where(["id_company"=>$id_company])->one();

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
      $TableUsers = TUsers::find()->where(["email"=>$email])->one();

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
        return $this->id_company;
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
