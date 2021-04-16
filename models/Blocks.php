<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blocks".
 *
 * @property int $id
 * @property string $names
 *
 * @property Inventory[] $inventoryTables
 * @property Request[] $requests
 */
class Blocks extends \yii\db\ActiveRecord
{
    public  $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blocks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['names'], 'required'],
            [['names'], 'string', 'max' => 255],
            [['names'],'unique'],
            [['file'],'file']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'names' => 'Names',
            'file'=>'Upload File'
        ];
    }

    /**
     * Gets query for [[InventoryTables]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventoryTables()
    {
        return $this->hasMany(Inventory::className(), ['block_id' => 'id']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['block_id' => 'id']);
    }
}
