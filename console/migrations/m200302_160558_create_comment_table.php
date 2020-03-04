<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m200302_160558_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'text'=>$this->text(),
            'instance_name'=>$this->string(),
            'instance_record_id'=>$this->integer(),
            'created_at'=>$this->timestamp(),
            'parent_id'=>$this->integer()
        ]);

        // add foreign key for table `user_id`
        $this->addForeignKey(
            'fk-comment-user_id',
            'comment',
            'user_id',
            'user',
            'id'
        );

        // add foreign key for table `parent_id`
        $this->addForeignKey(
            'fk-comment-parent_id',
            'comment',
            'parent_id',
            'comment',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-comment-user_id}}',
            '{{%comment}}'
        );

        $this->dropForeignKey(
            '{{%fk-comment-parent_id}}',
            '{{%comment}}'
        );

        $this->dropTable('{{%comment}}');
    }
}
