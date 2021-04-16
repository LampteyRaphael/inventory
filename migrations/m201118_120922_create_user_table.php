<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m201118_120922_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username'=>$this->string()->notNull(),
            'password'=>$this->string()->notNull(),
            'email'=>$this->string()->notNull(),
            'authKey'=>$this->string(),
            'accessToken'=>$this->string(),
            'role_id'=>$this->integer(),
            'block_id'=>$this->integer(),
            'room_id'=>$this->integer(),
        ]);
        // $this->addForeignKey('FK_user_block','user','block_id','blocks','id');
        // $this->addForeignKey('FK_user_room','user','room_id','rooms','id');


    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
