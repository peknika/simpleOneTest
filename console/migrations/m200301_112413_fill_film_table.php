<?php

use yii\db\Migration;

/**
 * Class m200301_112413_fill_film_table
 */
class m200301_112413_fill_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $queries = [
            "INSERT INTO `yii2advanced`.`film`(`name`, `director_id`, `year`, `review`, `id`) VALUES ('Citizen Kane', 1, 1941, 10, 1);",
            "INSERT INTO `yii2advanced`.`film`(`name`, `director_id`, `year`, `review`, `id`) VALUES ('Vertigo', 2, 1958, 10, 3);",
            "INSERT INTO `yii2advanced`.`film`(`name`, `director_id`, `year`, `review`, `id`) VALUES ('2001: A Space Odyssey', 3, 1968, 10, 4);",
            "INSERT INTO `yii2advanced`.`film`(`name`, `director_id`, `year`, `review`, `id`) VALUES ('Rules of the Game, The', 4, 1939, 9, 5);",
            "INSERT INTO `yii2advanced`.`film`(`name`, `director_id`, `year`, `review`, `id`) VALUES ('8½', 5, 1963, 10, 7);",
            "INSERT INTO `yii2advanced`.`film`(`name`, `director_id`, `year`, `review`, `id`) VALUES ('Seven Samurai', 6, 1954, 10, 8);",
            "INSERT INTO `yii2advanced`.`film`(`name`, `director_id`, `year`, `review`, `id`) VALUES ('Psycho', 2, 1960, 10, 9);",
            "INSERT INTO `yii2advanced`.`film`(`name`, `director_id`, `year`, `review`, `id`) VALUES ('Dr. Strangelove or: How I Learned to Stop Worrying and Love the Bomb', 3, 1964, 10, 10);",
        ];

        foreach ($queries as $q)
        {
            Yii::$app->db->createCommand($q)->execute();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200301_112413_fill_film_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200301_112413_fill_film_table cannot be reverted.\n";

        return false;
    }
    */
}
