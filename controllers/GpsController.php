<?php


namespace app\controllers;


use yii\web\Controller;
use app\classes\ContentGenerator;

class GpsController extends Controller
{
    public $layout = 'gps';

    public function actionIndex()
    {
        ContentGenerator::getMixSelectQuestion(1);

        return $this->render('index');
    }


}