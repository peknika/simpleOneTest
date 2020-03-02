<?php

use yii\db\Migration;

/**
 * Class m200301_110036_fill_director_table
 */
class m200301_110036_fill_director_table extends Migration
{
    public function safeUp()
    {
        $queries = [
            "INSERT INTO `yii2advanced`.`director`(`id`, `name`, `country`) VALUES (1, 'Welles, Orson', 'USA');",
            "INSERT INTO `yii2advanced`.`director`(`id`, `name`, `country`) VALUES (2, 'Hitchcock, Alfred', 'USA');",
            "INSERT INTO `yii2advanced`.`director`(`id`, `name`, `country`) VALUES (3, 'Kubrick, Stanley', 'UK');",
            "INSERT INTO `yii2advanced`.`director`(`id`, `name`, `country`) VALUES (4, 'Renoir, Jean', 'France');",
            "INSERT INTO `yii2advanced`.`director`(`id`, `name`, `country`) VALUES (5, 'Fellini, Federico	', 'Italy');",
            "INSERT INTO `yii2advanced`.`director`(`id`, `name`, `country`) VALUES (6, 'Kurosawa, Akira', 'Japan');",
        ];

        foreach ($queries as $q)
        {
            Yii::$app->db->createCommand($q)->execute();
        }
    }

    public function safeDown()
    {
        echo "m200301_110036_fill_director_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200301_110036_fill_director_table cannot be reverted.\n";

        return false;
    }
    */
}
