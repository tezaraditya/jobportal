<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "working".
 *
 * @property integer $id_working
 * @property integer $id_user
 * @property string $company
 * @property string $type
 * @property string $position
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property string $salary
 *
 * @property Users $idUser
 */
class Working extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'working';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'company', 'type', 'position', 'description', 'start_date', 'end_date', 'salary'], 'required'],
            [['id_user'], 'integer'],
            [['description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['company', 'type', 'position'], 'string', 'max' => 100],
            [['salary'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_working' => 'Id Working',
            'id_user' => 'Id User',
            'company' => 'Company',
            'type' => 'Type',
            'position' => 'Position',
            'description' => 'Description',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'salary' => 'Salary',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(Users::className(), ['id_user' => 'id_user']);
    }
}
