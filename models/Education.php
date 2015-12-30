<?php

namespace app\models;

use Yii;

class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'degree', 'institution', 'majors', 'start_date', 'end_date', 'gpa'], 'required'],
            [['id_user'], 'integer'],
            [['gpa'],'string', 'max' => 5],
            [['start_date', 'end_date'], 'safe'],
            [['degree', 'institution', 'majors'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_education' => 'Id Education',
            'id_user' => 'Id User',
            'degree' => 'Degree',
            'institution' => 'Institution',
            'majors' => 'Majors',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'gpa' => 'Gpa',
        ];
    }
}
