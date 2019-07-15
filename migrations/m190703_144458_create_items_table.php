<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%items}}`.
 */
class m190703_144458_create_items_table extends Migration
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
            '{{%items}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(50)->notNull(),
                'price' => $this->integer()->notNull()
            ],
            $tableOptions
        );
        $this->alterColumn('{{%items}}', 'id', $this->Integer(8) . ' NOT NULL AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%items}}');
    }
}
