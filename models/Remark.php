<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "remark".
 *
 * @property int $id
 * @property string $name
 *
 * @property RequestSub[] $requestSubs
 */
class Remark extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'remark';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[RequestSubs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestSubs()
    {
        return $this->hasMany(RequestSub::className(), ['remark' => 'id']);
    }
}
