<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Inventory[] $inventoryTables
 * @property RequestSub[] $requestSubs
 */
class Item extends \yii\db\ActiveRecord
{
    public  $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
            'name' => 'Name',
            'file'=>'Upload Excel File'
        ];
    }

    /**
     * Gets query for [[InventoryTables]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventoryTables()
    {
        return $this->hasMany(Inventory::className(), ['item_id' => 'id']);
    }

    /**
     * Gets query for [[RequestSubs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestSubs()
    {
        return $this->hasMany(RequestSub::className(), ['item' => 'id']);
    }
}
