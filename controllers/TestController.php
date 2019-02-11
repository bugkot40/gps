<?php


namespace app\controllers;


use app\models\Question;
use yii\web\Controller;
use app\classes\ContentGenerator;

class TestController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProcedure($testId = null)
    {
        if (\Yii::$app->request->isAjax) {
            $testId = \Yii::$app->request->get();
        }
        if ($testId) {
            ContentGenerator::testStart($testId);
            $question = ContentGenerator::getProcedureQuestion($testId);
        }
        return $this->renderPartial('_procedure', [
            'question' => $question,
        ]);
    }

    public function actionProcedureNext($testId = null)
    {
        if (\Yii::$app->request->isAjax) {
            $testId = \Yii::$app->request->get();
        }
        if ($testId) $question = ContentGenerator::getProcedureQuestion($testId);

        return $this->renderPartial('_procedure', [
            'question' => $question,
        ]);
    }

    public function actionTest($testId = null)
    {
        if (\Yii::$app->request->isAjax) {
            $testId = \Yii::$app->request->get();
        }
        if ($testId) {
            ContentGenerator::testStart($testId);
            $question = ContentGenerator::getSelectQuestion($testId);
        }
        return $this->renderPartial('_test', [
            'question' => $question,
        ]);
    }

    public function actionTestNext($testId = null)
    {
        if (\Yii::$app->request->isAjax) {
            $testId = \Yii::$app->request->get();
        }
        if ($testId) $question = ContentGenerator::getSelectQuestion($testId);

        return $this->renderPartial('_test', [
            'question' => $question,
        ]);
    }

    public function actionMix($mixId = null)
    {
        if (\Yii::$app->request->isAjax) {
            $mixId = \Yii::$app->request->get();
        }
        if ($mixId) {
            ContentGenerator::mixStart($mixId);
            $question = ContentGenerator::getMixSelectQuestion($mixId);
        }

        return $this->renderPartial('_mix', [
            'question' => $question,
            'mixId' => $mixId,
        ]);
    }

    public function actionMixNext($mixId = null)
    {
        if (\Yii::$app->request->isAjax) {
            $mixId = \Yii::$app->request->get();
        }
        if ($mixId) $question = ContentGenerator::getMixSelectQuestion($mixId);

        return $this->renderPartial('_mix', [
            'question' => $question,
        ]);
    }


}