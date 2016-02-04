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
 * @property string $level
 * @property string $experience
 * @property string $education
 * @property string $requirements
 * @property string $responsibilities
 * @property string $created_date
 *
 * @property JobFunction $function0
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
            [['position', 'company', 'email', 'location', 'salary_min', 'salary_max', 'function', 'level', 'experience', 'education', 'requirements', 'responsibilities'], 'required'],
            [['requirements', 'responsibilities'], 'string'],
            [['created_date'],'safe'],
            [['position', 'company', 'location', 'function', 'level', 'experience', 'education'], 'string', 'max' => 100],
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
            'level' => 'Level',
            'experience' => 'Experience',
            'education' => 'Education',
            'requirements' => 'Requirements',
            'responsibilities' => 'Responsibilities',
            'created_date' => 'Created Date'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunction0()
    {
        return $this->hasOne(JobFunction::className(), ['function' => 'function']);
    }
}
