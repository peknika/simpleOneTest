<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%director}}`.
 */
class m200228_105150_create_director_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%director}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'country' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%director}}');
    }
}
