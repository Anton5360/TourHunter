<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%transfers}}`.
 */
class m210124_141727_create_transfers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transfers}}', [
            'id' => $this->primaryKey(),
            'from_user_id' => $this->integer()->notNull(),
            'to_user_id' => $this->integer()->notNull(),
            'amount' => $this->decimal(10,2)->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultValue(new Expression('CURRENT_TIMESTAMP')),
        ]);

        $this->addForeignKey(
            'fk-transfers-from_user_id-users-id',
            '{{%transfers}}',
            'from_user_id',
            '{{%users}}',
            'id',
            'NO ACTION',
            'CASCADE',
        );
        $this->addForeignKey(
            'fk-transfers-to_user_id-users-id',
            '{{%transfers}}',
            'to_user_id',
            '{{%users}}',
            'id',
            'NO ACTION',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-transfers-to_user_id-users-id', '{{%transfers}}');
        $this->dropForeignKey('fk-transfers-from_user_id-users-id', '{{%transfers}}');
        $this->dropTable('{{%transfers}}');
    }
}
