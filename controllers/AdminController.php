<?php
/**
 * Created by PhpStorm.
 * User: kot
 * Date: 10.02.19
 * Time: 8:28
 */

namespace app\controllers;


use app\classes\AdminDb;
use app\models\Question;
use yii\web\Controller;

class AdminController extends Controller
{
    public function actionQuestionAdd($testId)
    {
        $newQuestion = new Question();

        if ($newQuestion->load(\Yii::$app->request->post()) && $newQuestion->validate()) {
            AdminDb::questionSave($newQuestion, $testId);
        }

        return $this->render('question-add', [
            'testId' => $testId,
            'newQuestion' => $newQuestion,
        ]);
    }
}