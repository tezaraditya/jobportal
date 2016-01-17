<?php

namespace app\models;

use Yii;


class Users extends \yii\db\ActiveRecord
{
    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'email', 'password'], 'required'],
            [['birthdate', 'join_date'], 'safe'],
            [['gender', 'marital_status', 'identity_address', 'domicile_address', 'active'], 'string'],
            [['height', 'weight'], 'integer'],
            [['nationaly'], 'string', 'max' => 50],
            [['birthplace'], 'string', 'max' => 100],
            [['email','authKey'], 'unique'],
            [['religion', 'postal_code', 'domicile_postal_code', 'phone'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 300,'min'=>6],
            [['verifyCode'],'captcha']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'fullname' => 'Fullname',
            'birthplace' => 'Birthplace',
            'birthdate' => 'Birthdate',
            'religion' => 'Religion',
            'gender' => 'Gender',
            'marital_status' => 'Marital Status',
            'nationaly' => 'Nationaly',
            'height' => 'Height',
            'weight' => 'Weight',
            'identity_address' => 'Identity Address',
            'postal_code' => 'Postal Code',
            'domicile_address' => 'Domicile Address',
            'domicile_postal_code' => 'Domicile Postal Code',
            'phone' => 'Phone',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'join_date' => 'Join Date',
            'active' => 'Active',
            'verifyCode' => 'Are You Human ?',
        ];
    }


	public function beforeSave($insert) {
    if(isset($this->password))

		 $this->password = bin2hex($this->password);
		 $this->authKey = sha1($this->email);
		 $this->join_date = date('Y-m-d H:i:s');

		if($this->domicile_address == NULL)

			$this->domicile_address = $this->identity_address;
			$this->domicile_postal_code = $this->postal_code;





		return parent::beforeSave($insert);
	}



}
