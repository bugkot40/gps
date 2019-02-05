<?php

use yii\db\Migration;

/**
 * Class m190204_184336_init_migration
 */
class m190204_184336_init_migration extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey('connection-ps_id-fk', 'connection', 'ps_id', 'ps', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('connection-instruction_id-fk', 'connection', 'instruction_id', 'instruction', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('connection-scheme_id-fk', 'connection', 'scheme_id', 'scheme', 'id', 'SET NULL', 'CASCADE');

        $this->addForeignKey('instruction-connection_id-fk', 'instruction', 'connection_id', 'connection', 'id', 'SET NULL', 'CASCADE');

        $this->addForeignKey('scheme-connection_id-fk', 'scheme', 'connection_id', 'connection', 'id', 'SET NULL', 'CASCADE');

        $this->addForeignKey('question-test_id-fk', 'question', 'test_id', 'test', 'id', 'CASCADE', 'CASCADE');

    }

    public function safeDown()
    {
        $this->dropForeignKey('question-test_id-fk', 'question');
        $this->dropForeignKey('scheme-connection_id-fk', 'scheme');
        $this->dropForeignKey('instruction-connection_id-fk', 'instruction');
        $this->dropForeignKey('connection-scheme_id-fk', 'connection');
        $this->dropForeignKey('connection-instruction_id-fk', 'connection');
        $this->dropForeignKey('connection-ps_id-fk', 'connection');
    }

}
