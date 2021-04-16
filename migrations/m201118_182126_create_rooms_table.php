<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rooms}}`.
 */
class m201118_182126_create_rooms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rooms}}', [
            'id' => $this->primaryKey(),
            'names'=>$this->string()->notNull()
        ]);
//        'names'=>$this->string()->notNull()

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rooms}}');
    }
}
