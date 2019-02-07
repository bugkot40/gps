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

    public static function getSelectQuestion($testId = 1)
    {
        $questions = Question::find()->where([
            'use' => 0,
            'test_id' => $testId
        ])->asArray()->all();

        if ($questions) {
            $selectQuestion = self::shuffle($questions);
            debug($selectQuestion);
        }
        else debug('вопросы закончились');

    }

    public static function getMixSelectQuestion($mixId = 1)
    {
        $mix = false;
        $tests = Test::find()->where([
            'mix_id' => $mixId,
        ])->with('questions')->asArray()->all();


        foreach ($tests as $test) {
            foreach ($test['questions'] as $question) {
               if ($question['use'] == 0) {
                    $mix[] = $question;
                } else continue;
            };
        }
        if ($mix) {
            debug($mix);
            $q = self::shuffle($mix);
            //debug($q);
        }

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