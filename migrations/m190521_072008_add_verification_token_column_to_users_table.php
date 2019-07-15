<?php

use yii\db\Migration;

/**
 * Handles adding verification_token to table `{{%users}}`.
 */
class m190521_072008_add_verification_token_column_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%users}}', 'verification_token', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%users}}', 'verification_token');
    }
}
