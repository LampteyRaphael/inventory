<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_category".
 *
 * @property int $id
 * @property string $name
 *
 * @property Inventory[] $inventoryTables
 */
class StatusCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'unique'],
            [['name'], 'string', 'max' => 20],
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
     * Gets query for [[InventoryTables]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventory()
    {
        return $this->hasMany(Inventory::className(), ['status' => 'id']);
    }
}
