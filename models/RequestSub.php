<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request_sub".
 *
 * @property int $id
 * @property int $quantity
 * @property int $item_id
 * @property int $request_id
 * @property int $user_id
 * @property int|null $quantityIssued
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Item $item
 * @property Request $request
 * @property User $user
 */
class RequestSub extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_sub';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'item_id', 'request_id', 'user_id','remark'], 'required'],
            [['quantity', 'item_id', 'request_id', 'remark','autOfficer', 'user_id', 'quantityIssued'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['request_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['file'],'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantity' => 'Quantity',
            'item_id' => 'Item',
            'request_id' => 'Status',
            'user_id' => 'User',
            'remark'  => 'Remark',
            'autOfficer'=>'Auth User',
            'quantityIssued' => 'Quantity Issued',
            'created_at' => 'Date',
            'updated_at' => 'Date',
            'file'=>'Upload Excel',
        

        ];
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }

    /**
     * Gets query for [[Request]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::className(), ['id' => 'request_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    public function getOfficer(){
        
        return $this->hasOne(User::className(), ['id' => 'autOfficer']);
    }

    public function getRemarks(){
        
        return $this->hasOne(Remark::className(), ['id' => 'remark']);
    }
}
