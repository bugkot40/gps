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
        return $menu;
    }

    public static function testStart($testId)
    {
        $questions = Question::find()->where([
            'test_id' => $testId,
            'use' => 1
        ])->all();

        foreach ($questions as $question) {
            $question->use = 0;
            $question->save();
        }

    }

    public static function mixStart($mixId)
    {
        $tests = Test::find()->where(['mix_id' => $mixId])->with('questions')->all();
        foreach ($tests as $test){
            foreach ($test['questions'] as $question) {
                if($question->use == 1){
                    $question->use = 0;
                    $question->save();
                }
            }
        }
    }


    public static function getProcedureQuestion($testId)
    {
        $procedureQuestion = Question::find()->where([
            'test_id' => $testId,
            'use' => 0,
        ])->orderBy('id')->one();
        if ($procedureQuestion) {
            $procedureQuestion->use = 1;
            $procedureQuestion->save();
            return $procedureQuestion;
        } else return false;

    }

    public static function getSelectQuestion($testId)
    {
        $questions = Question::find()->where([
            'test_id' => $testId,
            'use' => 0
        ])->asArray()->all();

        if ($questions) {
            return self::shuffleAndSelect($questions);
        } else return false;

    }

    public static function getMixSelectQuestion($mixId)
    {
        $mix = false;
        $tests = Test::find()->where([
            'mix_id' => $mixId,
        ])->with('questions')->asArray()->all();

        foreach ($tests as $test) {
            if ($test['questions']) {
                foreach ($test['questions'] as $question) {
                    if ($question['use'] == 0) {
                        $mix[] = $question;
                    }
                };
            }
        }
        if ($mix) {
            return self::shuffleAndSelect($mix);
        } else return false;

    }

    private static function shuffleAndSelect($array)
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