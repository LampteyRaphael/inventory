<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%brandNames}}`.
 */
class m201118_181220_create_brandNames_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%brandNames}}', [
            'id' => $this->primaryKey(),
            'brandCategories'=>$this->string()->notNull(),
        ]);
//        'brandCategories'=>$this->string()->notNull(),
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%brandNames}}');
    }
}
