<?php

use yii\db\Migration;

/**
 * Class m180225_150356_alter_user_table
 */
class m180225_150356_alter_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'about', $this->text());
        $this->addColumn('{{%user}}', 'type', $this->integer(3));
        $this->addColumn('{{%user}}', 'nickname', $this->string(70));
        $this->addColumn('{{%user}}', 'picture', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{$user}}', 'nickname');
        $this->dropColumn('{{$user}}', 'type');
        $this->dropColumn('{{$user}}', 'about');
        $this->dropColumn('{{$user}}', 'picture');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180225_150356_alter_user_table cannot be reverted.\n";

        return false;
    }
    */
}
