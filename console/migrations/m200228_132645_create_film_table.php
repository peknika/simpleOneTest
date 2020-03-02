<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%director}}`
 */
class m200228_132645_create_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'director_id' => $this->integer()->notNull(),
            'year' => $this->integer(4),
            'review' => $this->integer(11),
        ]);

        // creates index for column `director_id`
        $this->createIndex(
            '{{%idx-film-director_id}}',
            '{{%film}}',
            'director_id'
        );

        // add foreign key for table `{{%director}}`
        $this->addForeignKey(
            '{{%fk-film-director_id}}',
            '{{%film}}',
            'director_id',
            '{{%director}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%director}}`
        $this->dropForeignKey(
            '{{%fk-film-director_id}}',
            '{{%film}}'
        );

        // drops index for column `director_id`
        $this->dropIndex(
            '{{%idx-film-director_id}}',
            '{{%film}}'
        );

        $this->dropTable('{{%film}}');
    }
}
