<?php

use yii\db\Expression;
use yii\db\Migration;


class m210124_114533_create_users_table extends Migration
{

    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'nickname' => $this->string(100)->notNull()->unique(),
            'balance' => $this->decimal(10,2)->notNull()->defaultValue(0),
            'created_at' => $this->timestamp()
                ->notNull()
                ->defaultValue(new Expression('CURRENT_TIMESTAMP')),
        ]);
    }


    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
