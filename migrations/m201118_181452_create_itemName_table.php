<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%itemName}}`.
 */
class m201118_181452_create_itemName_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%itemName}}', [
            'id' => $this->primaryKey(),
            'itemNames'=>$this->string(),
        ]);
//        'itemNames'=>$this->string(),

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%itemName}}');
    }
}
