<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m190517_115145_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */


    public function safeUp()
    {

        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable(
            '{{%users}}',
            [
                'id' => $this->primaryKey(),
                'username' => $this->string()->notNull()->unique(),
                'auth_key' => $this->string(32)->defaultValue(null),
                'password_hash' => $this->string()->defaultValue(null),
                'password_reset_token' => $this->string()->defaultValue(null),
                'email' => $this->string()->notNull()->unique(),
                'status' => $this->integer()->notNull(),
                'created_at' => $this->integer()->notNull(),
                'updated_at' => $this->integer()->notNull(),
            ],
            $tableOptions
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
