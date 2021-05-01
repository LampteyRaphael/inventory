<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "inventory".
 *
 * @property int $id
 * @property int $item_id
 * @property int $category_id
 * @property int $brand_id
 * @property string|null $serial
 * @property string|null $model
 * @property string|null $description
 * @property int $status
 * @property int $block_id
 * @property int $room_id
 * @property int $user_id
 *
 * @property Item $item
 * @property Category $category
 * @property Brand $brand
 * @property StatusCategory $status0
 * @property Blocks $block
 * @property Room $room
 * @property User $user
 */
class Inventory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory';
    }

    public $file;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'category_id', 'status', 'block_id', 'room_id', 'user_id','serial', 'model'], 'required'],
            [['item_id', 'category_id', 'brand_id', 'status', 'block_id', 'room_id', 'user_id'], 'integer'],
            [['serial','model'],'unique'],
            [['serial', 'model', 'description'], 'string', 'max' => 200],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => StatusCategory::className(), 'targetAttribute' => ['status' => 'id']],
            [['block_id'], 'exist', 'skipOnError' => true, 'targetClass' => Blocks::className(), 'targetAttribute' => ['block_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['file'],'file'],
            [['file'],'required']
//            [['serial', 'model'], 'unique'],
            // [['created_at','updated_at'],'date']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item',
            'category_id' => 'Category',
            'brand_id' => 'Brand',
            'serial' => 'Serial',
            'model' => 'Model',
            'description' => 'Description',
            'status' => 'Status',
            'block_id' => 'Block',
            'room_id' => 'Room',
            'user_id' => 'User',
            'file'=>'Logo',
        ];
    }


    public static function getList(){
        // ArrayHelper::map(Item::find()->all(),'id','name')
        return  ArrayHelper::map(Item::find()->all(),'name','name');
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
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(StatusCategory::className(), ['id' => 'status']);
    }

    /**
     * Gets query for [[Block]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlock()
    {
        return $this->hasOne(Blocks::className(), ['id' => 'block_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
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
}
