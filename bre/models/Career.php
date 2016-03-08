<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "career".
 *
 * @property integer $id_career
 * @property string $position
 * @property string $company
 * @property string $email
 * @property string $location
 * @property string $salary_min
 * @property string $salary_max
 * @property string $function
 * @property string $experience
 * @property string $education
 * @property string $requirements
 * @property string $responsibilities
 * @property string $created_date
 *
 * @property JobFunction $function0
 * @property Location $location0
 * @property Sendcv[] $sendcvs
 * @property Sendcv[] $sendcvs0
 * @property Sendcv[] $sendcvs1
 */
class Career extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'career';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'company', 'email', 'location', 'function', 'experience', 'education', 'requirements', 'responsibilities', 'created_date'], 'required'],
            [['requirements', 'responsibilities'], 'string'],
            [['created_date'], 'safe'],
            [['position', 'company', 'location', 'function', 'experience', 'education'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 200],
            [['salary_min', 'salary_max'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_career' => 'Id Career',
            'position' => 'Position',
            'company' => 'Company',
            'email' => 'Email',
            'location' => 'Location',
            'salary_min' => 'Salary Min',
            'salary_max' => 'Salary Max',
            'function' => 'Function',
            'experience' => 'Experience',
            'education' => 'Education',
            'requirements' => 'Requirements',
            'responsibilities' => 'Responsibilities',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunction0()
    {
        return $this->hasOne(JobFunction::className(), ['function' => 'function']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation0()
    {
        return $this->hasOne(Location::className(), ['location' => 'location']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSendcvs()
    {
        return $this->hasMany(Sendcv::className(), ['id_career' => 'id_career']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSendcvs0()
    {
        return $this->hasMany(Sendcv::className(), ['receiver_email' => 'email']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSendcvs1()
    {
        return $this->hasMany(Sendcv::className(), ['receiver_name' => 'company']);
    }

    public function beforeSave($insert) {

      if(empty($this->salary_min)) {

        $this->salary_min = "Negotiable";

      }

    else  if(isset($this->salary_min)) {

        $this->salary_min = number_format($this->salary_min, 0, ',',',');
        $this->salary_max = number_format($this->salary_max, 0, ',',',');

      }


      return parent::beforeSave($insert);


    }
}
