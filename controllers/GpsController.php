<?php


namespace app\controllers;


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
        ContentGenerator::getSelectQuestion(1);
    }

    public function actionMix()
    {
        ContentGenerator::getMixSelectQuestion(1);
    }


}