<?php

use yii\db\Migration;
use app\models\Test;

/**
 * m190204_184800_ppb
 */
class m190204_184800_ppb extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $nameTest = 'Правила пожарной безопасности для энергетических предприятий, средства пожаротушения';

        $testQuestions = [
            [
                'ссылка1-ppb',
                'вопрос1-ppb',
                'ответ1-ppb',
                'рис1-ppb'
            ],
            [
                'ссылка2-ppb',
                'вопрос2-ppb',
                'ответ2-ppb',
                'рис2-ppb'
            ],
            [
                'ссылка3-ppb',
                'вопрос3-ppb',
                'ответ3-ppb',
                'рис3-ppb'
            ],
            [
                'ссылка4-ppb',
                'вопрос4-ppb',
                'ответ4-ppb',
                'рис4-ppb'
            ],
            [
                'ссылка5-ppb',
                'вопрос5-ppb',
                'ответ5-ppb',
                'рис5-ppb'
            ],

        ];
        $test = Test::find()->where(['name'=> $nameTest])->one();
        $testId = $test->id;


        foreach($testQuestions as $testQuestion){
            $n = 0;
            foreach($testQuestion as $elementQuestion){
                $n++;
                $element[$n] = $elementQuestion;
            }

            $this->insert('question', [
                'test_id' => $testId,
                'link' => $element[1],
                'question' => $element[2],
                'answer' => $element[3],
                'image' => $element[4]
            ]);

        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('question');
    }

}
