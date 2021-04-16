<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categoryName}}`.
 */
class m201118_181712_create_categoryName_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categoryName}}', [
            'id' => $this->primaryKey(),
            'categoryName'=>$this->string(),
        ]);
//        'categoryName'=>$this->string(),

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categoryName}}');
    }
}
