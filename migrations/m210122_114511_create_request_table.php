<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 */
class m210122_114511_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'item_id'=>$this->integer(),
            'quantity'=>$this->integer(),
            'quantityIssued'=>$this->integer()->null(),
            'block_id'=>$this->integer(),
            'room_id'=>$this->integer(),
            'user_id'=>$this->integer(),
            'remark'=>$this->string(),
            'autOfficer'=>$this->integer(),
            'rank'=>$this->string()->null(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null(),
        ]);
        $this->addForeignKey('FK_request_user','request','user_id','user','id');
        $this->addForeignKey('FK_request_item','request','item_id','itemName','id');
        $this->addForeignKey('FK_request_block','request','block_id','blocks','id');
        $this->addForeignKey('FK_request_inventory','request','room_id','rooms','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%request}}');
    }
}
