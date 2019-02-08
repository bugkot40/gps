<?php

namespace app\classes;

use app\models\Ps;
use app\models\Test;
use app\models\Question;

use Yii;

class ContentGenerator
{
    /**
     * Generation of objects in the menu section
     * @return mixed
     */
    public static function getMenu()
    {
        $menu['ps'] = Ps::find()->asArray()->all();
        $menu['test'] = Test::find()->asArray()->all();

        debug($menu);
    }

    public static function testStart()
    {
        $questions = Question::find()->where(['use'=> 1])->all();

        foreach($questions as $question){
            $question->use = 0;
            $question->save();
        }

    }

    public static function getSelectQuestion($testId)
    {
        $questions = Question::find()->where([
            'use' => 0,
            'test_id' => $testId
        ])->asArray()->all();

        if ($questions) {
            $selectQuestion = self::shuffle($questions);
            return $selectQuestion;
        } else return false;

    }

    public static function getMixSelectQuestion($mixId)
    {
        $mix = false;
        $tests = Test::find()->where([
            'mix_id' => $mixId,
        ])->with('questions')->asArray()->all();

        foreach ($tests as $test) {
            if($test['questions']){
                foreach ($test['questions'] as $question) {
                   if ($question['use'] == 0) {
                        $mix[] = $question;
                    }
                };
            }
        }
        if ($mix) {
           return self::shuffle($mix);
        } else false;

    }

    private static function shuffle($array)
    {
        shuffle($array);

        $question = Question::find()->where([
            'id' => $array[0]['id'],
        ])->one();

        $question->use = 1;
        $question->save();

        return $question;
    }


}