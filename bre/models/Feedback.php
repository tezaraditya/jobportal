<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $id_feedback
 * @property string $subject
 * @property string $feedback
 * @property string $name
 * @property string $email
 * @property string $phone
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'feedback', 'name', 'email', 'phone'], 'required'],
            [['feedback'], 'string'],
            [['subject'], 'string', 'max' => 300],
            [['name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_feedback' => 'Id Feedback',
            'subject' => 'Subject',
            'feedback' => 'Feedback',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
        ];
    }
}
