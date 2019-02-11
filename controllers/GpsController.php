<?php
/**
 * Created by PhpStorm.
 * User: kot
 * Date: 10.02.19
 * Time: 17:55
 */

namespace app\controllers;


use app\models\Ps;
use yii\web\Controller;

class GpsController extends Controller
{
    public  $layout = 'gps';

    public function actionIndex(){
        return $this->render('index');
    }
    public function actionGps($psId)
    {
        $ps=Ps::findOne(['id' => $psId]);
        return $this->render('gps', [
            'psName' => $ps->name,
        ]);
    }
}