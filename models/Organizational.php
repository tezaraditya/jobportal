<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organizational".
 *
 * @property integer $id_organizational
 * @property integer $id_user
 * @property string $organizational_name
 * @property string $position
 * @property string $responsibility
 * @property string $start_date
 * @property string $end_date
 *
 * @property Users $idUser
 */
class Organizational extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organizational';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'organizational_name', 'position', 'responsibility', 'start_date', 'end_date'], 'required'],
            [['id_user'], 'integer'],
            [['responsibility'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['organizational_name', 'position'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_organizational' => 'Id Organizational',
            'id_user' => 'Id User',
            'organizational_name' => 'Organizational Name',
            'position' => 'Position',
            'responsibility' => 'Responsibility',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
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
