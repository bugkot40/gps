<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>
    <h1>Добавить вопрос <?= $test->label ?></h1>
<?php $questionAdd = ActiveForm::begin(['options' => [
    'enctype' => 'multipart/form-data',
    'testId' => $testId,
]]); ?>

    <a id="add" href="<?= Url::toRoute(['test/index']) ?>">Выйти</a>

<?= $questionAdd->field($newQuestion, 'question')->textarea() ?>
<?= $questionAdd->field($newQuestion, 'answer')->textarea() ?>
<?= $questionAdd->field($newQuestion, 'link') ?>
<?= $questionAdd->field($newQuestion, 'image')->fileInput(['class' => 'user btn btn-primary'])->label('Добавить рисунок ?') ?>
<?= Html::submitButton('Добавить', ['id' => 'questionAdd', 'class' => 'user btn btn-primary']) ?>

<?php ActiveForm::end() ?>