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



    public function actionTest()
    {
        ContentGenerator::testStart();
        $question = ContentGenerator::getSelectQuestion(1);
        if ($question) debug($question); 
    }

    public function actionTestNext()
    {
        $question = ContentGenerator::getSelectQuestion(1);
        if ($question) debug($question);
    }

    public function actionMix()
    {
        ContentGenerator::testStart();
        $question = ContentGenerator::getMixSelectQuestion(1);
        if ($question) debug($question); 
    }

    public function actionMixNext()
    {

    }



}