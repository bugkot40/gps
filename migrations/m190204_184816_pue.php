<?php

use yii\db\Migration;
use app\models\Test;

/**
 * m190204_184816_pue
 */
class m190204_184816_pue extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $nameTest = 'Правила устройства электроустановок';

        $testQuestions = [
            [
                'ссылка1-pue',
                'вопрос1-pue',
                'ответ1-pue',
                'рис1-pue'
            ],
            [
                'ссылка2-pue',
                'вопрос2-pue',
                'ответ2-pue',
                'рис2-pue'
            ],
            [
                'ссылка3-pue',
                'вопрос3-pue',
                'ответ3-pue',
                'рис3-pue'
            ],
            [
                'ссылка4-pue',
                'вопрос4-pue',
                'ответ4-pue',
                'рис4-pue'
            ],
            [
                'ссылка5-pue',
                'вопрос5-pue',
                'ответ5-pue',
                'рис5-pue'
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
