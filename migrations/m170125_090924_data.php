<?php

use yii\db\Migration;

class m170125_090924_data extends Migration
{
    public function up()
    {
        for($i = 1; $i <= 20 ; $i++) {
            $this->insert('product',[
               'id' => $i,
                'name' => 'Продукт '.$i,
            ]);

        }
        for($i = 1; $i < 100 ; $i++) {
            $this->insert('meal',[
                'id' => $i,
                'name' => 'Блюдо '.$i,
            ]);
            $used = [];
            for($j = 0; $j <5; $j++){
                do {
                    $newIngr = rand(1, 20);
                } while (in_array($newIngr, $used));

                $this->insert('ingredient', [
                    'meal_id' => $i,
                    'product_id' => $newIngr,
                ]);
                $used[] = $newIngr;
            }
        }

    }

    public function down()
    {
        $this->delete('ingredient');
        $this->delete('meal');
        $this->delete('product');
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
