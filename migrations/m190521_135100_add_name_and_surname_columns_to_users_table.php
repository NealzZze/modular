<?php

use yii\db\Migration;

/**
 * Handles adding name_and_surname to table `{{%users}}`.
 */
class m190521_135100_add_name_and_surname_columns_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%users}}', 'name', $this->string()->defaultValue(null));
        $this->addColumn('{{%users}}', 'surname', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%users}}', 'surname');
        $this->dropColumn('{{%users}}', 'name');
    }
}
