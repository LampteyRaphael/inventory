<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blocks}}`.
 */
class m201118_182235_create_blocks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blocks}}', [
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
        $this->dropTable('{{%blocks}}');
    }
}
