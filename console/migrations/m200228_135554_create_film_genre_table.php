<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film_genre}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%genre}}`
 */
class m200228_135554_create_film_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film_genre}}', [
            'film_id' => $this->integer()->notNull(),
            'genre_id' => $this->integer()->notNull(),
            'PRIMARY KEY(film_id, genre_id)',
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-film_genre-film_id}}',
            '{{%film_genre}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-film_genre-film_id}}',
            '{{%film_genre}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `genre_id`
        $this->createIndex(
            '{{%idx-film_genre-genre_id}}',
            '{{%film_genre}}',
            'genre_id'
        );

        // add foreign key for table `{{%genre}}`
        $this->addForeignKey(
            '{{%fk-film_genre-genre_id}}',
            '{{%film_genre}}',
            'genre_id',
            '{{%genre}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%film}}`
        $this->dropForeignKey(
            '{{%fk-film_genre-film_id}}',
            '{{%film_genre}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-film_genre-film_id}}',
            '{{%film_genre}}'
        );

        // drops foreign key for table `{{%genre}}`
        $this->dropForeignKey(
            '{{%fk-film_genre-genre_id}}',
            '{{%film_genre}}'
        );

        // drops index for column `genre_id`
        $this->dropIndex(
            '{{%idx-film_genre-genre_id}}',
            '{{%film_genre}}'
        );

        $this->dropTable('{{%film_genre}}');
    }
}