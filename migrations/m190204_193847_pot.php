<?php

use yii\db\Migration;
use app\models\Test;

/**
 * Class m190204_193847_pot
 */
class m190204_193847_pot extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $testQuestions = [
            [
                'ссылка1',
                'вопрос1',
                'ответ1',
                'рис1'
            ],

            [
                'ссылка2',
                'вопрос2',
                'ответ2',
                'рис2'
            ],

            [
                'ссылка3',
                'вопрос3',
                'ответ3',
                ''
            ],

            [
                'ссылка4',
                'вопрос4',
                'ответ4',
                'рис4'
            ],
        ];
        $nameTest = 'Правила по охране труда при эксплуатации электроустановок';
        $testId = Test::find()->where(['name'=> $nameTest])->asArray()->one();


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
