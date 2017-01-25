<?php

use yii\db\Migration;

class m170124_222826_meals extends Migration
{
    public function up()
    {
        $this->createTable('{{%product}}',
            [
                'id' => 'pk',
                'name' => 'varchar(50) not null',
                1 => 'KEY (`name`)',

            ]);


        $this->createTable('{{%meal}}',
            [
                'id' => 'pk',
                'name' => 'varchar(50) not null',
                1 => 'KEY (`name`)',

            ]);

        $this->createTable('{{%ingredient}}',
            [
                'id' => 'pk',
                'meal_id' => 'int',
                'product_id' => 'int'
            ]);

        $this->addForeignKey('FK_ingredient_product','ingredient',['product_id'],'product',['id']);
        $this->addForeignKey('FK_ingredient_meal','ingredient',['meal_id'],'meal',['id']);
    }

    public function down()
    {
        $this->dropTable('{{%ingredient}}');
        $this->dropTable('{{%meal}}');
        $this->dropTable('{{%product}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
