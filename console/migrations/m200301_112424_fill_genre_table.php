<?php

use yii\db\Migration;

/**
 * Class m200301_112424_fill_genre_table
 */
class m200301_112424_fill_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $queries = [
            "INSERT INTO `yii2advanced`.`genre`(`id`, `name`, `description`) VALUES (1, 'Horror', 'Supernatural');",
            "INSERT INTO `yii2advanced`.`genre`(`id`, `name`, `description`) VALUES (2, 'Drama', 'Melodrama');",
            "INSERT INTO `yii2advanced`.`genre`(`id`, `name`, `description`) VALUES (3, 'Comedy', ' Black Comedy');",
            "INSERT INTO `yii2advanced`.`genre`(`id`, `name`, `description`) VALUES (4, ' Action', NULL);",
            "INSERT INTO `yii2advanced`.`genre`(`id`, `name`, `description`) VALUES (5, 'Film Noir', 'Detective-Mystery');",
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
        echo "m200301_112424_fill_genre_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200301_112424_fill_genre_table cannot be reverted.\n";

        return false;
    }
    */
}
