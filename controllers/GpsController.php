<?php


namespace app\controllers;


use yii\web\Controller;
use app\classes\ContentGenerator;

class GpsController extends Controller
{
    public $layout = 'gps';

    public function actionIndex()
    {
        $content = ContentGenerator::getSelectQuestion(1);

        debug($content);
        return $this->render('index');
    }


}