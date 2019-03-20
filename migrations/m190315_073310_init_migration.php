<?php

use yii\db\Migration;

/**
 * Class m190315_073310_init_migration
 */
class m190315_073310_init_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->createTable('link',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'text' => $this->string()
        ]);		

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      	$this->dropTable('link');
    }
	
	

}
