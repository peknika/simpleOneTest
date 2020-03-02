<?php

use yii\db\Migration;

/**
 * Class m200301_112449_fill_film_genre_table
 */
class m200301_112449_fill_film_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $queries = [
            "INSERT INTO `yii2advanced`.`film_genre`(`film_id`, `genre_id`) VALUES (1, 2);",
            "INSERT INTO `yii2advanced`.`film_genre`(`film_id`, `genre_id`) VALUES (1, 4);",
            "INSERT INTO `yii2advanced`.`film_genre`(`film_id`, `genre_id`) VALUES (3, 2);",
            "INSERT INTO `yii2advanced`.`film_genre`(`film_id`, `genre_id`) VALUES (8, 4);",
            "INSERT INTO `yii2advanced`.`film_genre`(`film_id`, `genre_id`) VALUES (9, 1);",
            "INSERT INTO `yii2advanced`.`film_genre`(`film_id`, `genre_id`) VALUES (7, 2);",
            "INSERT INTO `yii2advanced`.`film_genre`(`film_id`, `genre_id`) VALUES (10, 2);",
            "INSERT INTO `yii2advanced`.`film_genre`(`film_id`, `genre_id`) VALUES (10, 3);",
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
        echo "m200301_112449_fill_film_genre_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200301_112449_fill_film_genre_table cannot be reverted.\n";

        return false;
    }
    */
}
