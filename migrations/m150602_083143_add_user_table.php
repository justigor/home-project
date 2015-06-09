<?php

use yii\db\Schema;
use yii\db\Migration;

class m150602_083143_add_user_table extends Migration
{
    public function up()
    {
        // add table user
        $this->createTable('User', [
            'id'                 => Schema::TYPE_PK,
            'username'           => Schema::TYPE_STRING . ' NOT NULL',
            'authKey'            => Schema::TYPE_STRING . '(32) NOT NULL',
            'passwordHash'       => Schema::TYPE_STRING . ' NOT NULL',
            'passwordResetToken' => Schema::TYPE_STRING,
            'email'              => Schema::TYPE_STRING . ' NOT NULL',
            'status'             => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'createdAt'          => Schema::TYPE_INTEGER . ' NOT NULL',
            'updatedAt'          => Schema::TYPE_INTEGER . ' NOT NULL',
            'lastLogin'          => Schema::TYPE_INTEGER,
        ]);

        // add admin user
        $this->insert('User', [
            'id'                 => 1,
            'username'           => 'admin',
            'authKey'            => '6OFUxxVvoz067LISkZBY0JmZ-30NJK5j',
            'passwordHash'       => '$2y$13$BtICgI3WpoMuUe3/t4AXOuRQD6cx90mttQUfi7uYkC2nvGE8dh4Ve',
            'passwordResetToken' => 'FFFONvY8njNEkm16-czMKmoWSQtT9eoC_1417103710',
            'email'              => 'admin@mail.com',
            'status'             => 1,
            'createdAt'          => time(),
            'updatedAt'          => time(),
            'lastLogin'          => 0,
        ]);
    }

    public function down()
    {
        $this->dropTable('User');
    }
}
