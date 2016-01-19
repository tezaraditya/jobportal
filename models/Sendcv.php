<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sendcv".
 *
 * @property integer $id_sendcv
 * @property integer $id_career
 * @property string $receiver_name
 * @property string $receiver_email
 * @property string $subject
 * @property integer $id_user
 *
 * @property Career $idCareer
 * @property Career $receiverEmail
 * @property Users $idUser
 * @property Career $receiverName
 */
class Sendcv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sendcv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_career', 'receiver_name', 'receiver_email', 'subject', 'id_user'], 'required'],
            [['id_career', 'id_user'], 'integer'],
            [['receiver_name'], 'string', 'max' => 50],
            [['receiver_email'], 'string', 'max' => 200],
            [['subject'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sendcv' => 'Id Sendcv',
            'id_career' => 'Id Career',
            'receiver_name' => 'Receiver Name',
            'receiver_email' => 'Receiver Email',
            'subject' => 'Subject',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCareer()
    {
        return $this->hasOne(Career::className(), ['id_career' => 'id_career']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceiverEmail()
    {
        return $this->hasOne(Career::className(), ['email' => 'receiver_email']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(Users::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceiverName()
    {
        return $this->hasOne(Career::className(), ['company' => 'receiver_name']);
    }
}
