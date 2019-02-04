<?php

use yii\db\Migration;

/**
 * Class m190204_184202_init_migration
 */
class m190204_184202_init_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        /**
         * db gps
         */
        $this->createTable('ps',[
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()
        ]);

        $this->createTable('connection',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'ps_id' => $this->integer(),
            'instruction_id' => $this->integer(),
            'scheme_id' => $this->integer()
        ]);

        $this->createTable('instruction',[
            'id' => $this->primaryKey(),
            'connection_id' => $this->integer(),
            'name' => $this->string()
        ]);

        $this->createTable('scheme',[
            'id' => $this->primaryKey(),
            'connection_id' => $this->integer(),
            'name' => $this->string()
        ]);


        /**
         *	db тестов
         */
        $this->createTable('mix',[
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()
        ]);

        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'mix_id' => $this->integer(),
            'name' => $this->string()->unique()
        ]);

        $this->createTable('question', [
            'id' => $this->primaryKey(),
            'test_id' => $this->integer(),
            'link' => $this->string(),
            'question' => $this->text(),
            'answer' => $this->text(),
            'image' => $this->string(),
            'use' => $this->boolean()->defaultValue(0)
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('question');
        $this->dropTable('test');
        $this->dropTable('mix');

        $this->dropTable('scheme');
        $this->dropTable('instruction');
        $this->dropTable('connection');
        $this->dropTable('ps');

    }

}