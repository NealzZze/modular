<?php

use yii\db\Migration;

/**
 * Class m190703_150424_insert_goods_items
 */
class m190703_150424_insert_goods_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%items}}', ['id' => 1, 'name' => 'машинка белая', 'price' => 10]);
        $this->insert('{{%items}}', ['id' => 2, 'name' => 'машинка серая', 'price' => 20]);
        $this->insert('{{%items}}', ['id' => 3, 'name' => 'машинка чёрная', 'price' => 30]);
        $this->insert('{{%items}}', ['id' => 4, 'name' => 'лошадка', 'price' => 70]);
        $this->insert('{{%items}}', ['id' => 5, 'name' => 'сова', 'price' => 150]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "inserting cannot be reverting\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190703_150424_insert_goods_items cannot be reverted.\n";

        return false;
    }
    */
}
