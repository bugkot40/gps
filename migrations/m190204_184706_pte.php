<?php

use yii\db\Migration;
use app\models\Test;

/**
 * Class m190204_184706_pte
 */
class m190204_184706_pte extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $nameTest = 'Правила технической эксплуатации электрических станций и сетей РФ';

        $testQuestions = [
            [
                'ссылка1-pte',
                'вопрос1-pte',
                'ответ1-pte',
                'рис1-pte'
            ],
            [
                'ссылка2-pte',
                'вопрос2-pte',
                'ответ2-pte',
                'рис2-pte'
            ],
            [
                'ссылка3-pte',
                'вопрос3-pte',
                'ответ3-pte',
                'рис3-pte'
            ],
            [
                'ссылка4-pte',
                'вопрос4-pte',
                'ответ4-pte',
                'рис4-pte'
            ],
            [
                'ссылка5-pte',
                'вопрос5-pte',
                'ответ5-pte',
                'рис5-pte'
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
