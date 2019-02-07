<?php


namespace app\controllers;


use app\models\Question;
use yii\web\Controller;
use app\classes\ContentGenerator;

class GpsController extends Controller
{
    public $layout = 'gps';

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionNull()
    {
        $questions = Question::find()->where(['use'=> 1])->all();

        foreach($questions as $question){
            $question->use = 0;
            $question->save();
        }

    }

    public function actionTest()
    {
        ContentGenerator::getSelectQuestion(1);
    }

    public function actionMix()
    {
        ContentGenerator::getMixSelectQuestion(1);
    }



}