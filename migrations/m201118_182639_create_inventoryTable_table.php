<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%inventoryTable}}`.
 */
class m201118_182639_create_inventoryTable_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%inventoryTable}}', [
            'id' => $this->primaryKey(),
            'item_id'=>$this->integer(),
            'category_id'=>$this->integer(),
            'brand_id'=>$this->integer(),
            'serial'=>$this->string(),
            'model'=>$this->string(),
            'description'=>$this->string(),
            'status'=>$this->string(),
            'block_id'=>$this->integer(),
            'room_id'=>$this->integer(),
            'user_id'=>$this->integer(),
            
        ]);
        
        $this->addForeignKey('FK_inventoryTable','inventoryTable','user_id','user','id');
        $this->addForeignKey('FK_inventoryTable_brand','inventoryTable','brand_id','brandNames','id');
        $this->addForeignKey('FK_inventoryTable_item','inventoryTable','item_id','itemName','id');
        $this->addForeignKey('FK_inventoryTable_category','inventoryTable','category_id','categoryName','id');
        $this->addForeignKey('FK_inventoryTable_inventory','inventoryTable','room_id','rooms','id');
        $this->addForeignKey('FK_inventoryTable_block','inventoryTable','block_id','blocks','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%inventoryTable}}');
    }
}
