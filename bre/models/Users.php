<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id_user
 * @property string $fullname
 * @property string $birthplace
 * @property string $birthdate
 * @property string $religion
 * @property string $gender
 * @property string $marital_status
 * @property string $nationaly
 * @property integer $height
 * @property integer $weight
 * @property string $identity_address
 * @property string $postal_code
 * @property string $domicile_address
 * @property string $domicile_postal_code
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $join_date
 * @property string $active
 *
 * @property Certification[] $certifications
 * @property Education[] $educations
 * @property Organizational[] $organizationals
 * @property Sendcv[] $sendcvs
 * @property Working[] $workings
 */
class Users extends \yii\db\ActiveRecord
{
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
            [['fullname', 'birthplace', 'birthdate', 'religion', 'gender', 'marital_status', 'nationaly', 'height', 'weight', 'identity_address', 'postal_code', 'phone', 'email', 'password', 'authKey', 'accessToken', 'join_date', 'active'], 'required'],
            [['birthdate', 'join_date'], 'safe'],
            [['gender', 'marital_status', 'identity_address', 'domicile_address', 'active'], 'string'],
            [['height', 'weight'], 'integer'],
            [['fullname', 'birthplace', 'authKey', 'accessToken'], 'string', 'max' => 100],
            [['religion', 'postal_code', 'domicile_postal_code', 'phone'], 'string', 'max' => 20],
            [['nationaly', 'email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 300],
            [['email'], 'unique']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertifications()
    {
        return $this->hasMany(Certification::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationals()
    {
        return $this->hasMany(Organizational::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSendcvs()
    {
        return $this->hasMany(Sendcv::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkings()
    {
        return $this->hasMany(Working::className(), ['id_user' => 'id_user']);
    }
}
