<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "certification".
 *
 * @property integer $id_certification
 * @property integer $id_user
 * @property string $certification
 * @property string $institution
 * @property string $publication_date
 *
 * @property Users $idUser
 */
class Certification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'certification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'certification', 'institution', 'publication_date'], 'required'],
            [['id_user'], 'integer'],
            [['publication_date'], 'safe'],
            [['certification', 'institution'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_certification' => 'Id Certification',
            'id_user' => 'Id User',
            'certification' => 'Certification',
            'institution' => 'Institution',
            'publication_date' => 'Publication Date',
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
