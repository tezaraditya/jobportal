<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job_function".
 *
 * @property integer $id_job_function
 * @property string $function
 *
 * @property Career[] $careers
 */
class JobFunction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_function';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['function'], 'required'],
            [['function'], 'string', 'max' => 100],
            [['function'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_job_function' => 'Id Job Function',
            'function' => 'Function',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCareers()
    {
        return $this->hasMany(Career::className(), ['function' => 'function']);
    }
}
