<?php

use yii\db\Migration;

/**
 * Class m200322_191801_add_init_user_for_rbac_and_role
 */
class m200322_191801_add_init_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'id' => 1,
            'username' => 'admin',
            'auth_key' => '2g4gfpxilK7DKbWX300AwMji1CaZM6lA',
            'password_hash' => '$2y$13$ZsG5ym1vhLc8fe3d7BZMte1pB4Fy9rNlPwstwUH0ICzJ6DbpMXP5O',
            'email' => 'admin@site.ru',
            'created_at' => time(),
            'updated_at' => time()
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200322_191801_add_init_user_for_rbac_and_role cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200322_191801_add_init_user_for_rbac_and_role cannot be reverted.\n";

        return false;
    }
    */
}
