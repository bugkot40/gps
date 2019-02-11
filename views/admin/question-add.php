<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

<?php $questionAdd = ActiveForm::begin(['options' => [
    'enctype' => 'multipart/form-data',
    'testId' => $testId,
]]); ?>

    <a class="" href="<?= Url::toRoute(['test/index']) ?>">Выйти</a>

<?= $questionAdd->field($newQuestion, 'question')->textarea() ?>
<?= $questionAdd->field($newQuestion, 'answer')->textarea() ?>
<?= $questionAdd->field($newQuestion, 'link') ?>
<?= $questionAdd->field($newQuestion, 'image')->fileInput(['class' => 'user btn btn-primary'])->label('Добавить рисунок ?') ?>
<?= Html::submitButton('Добавить', ['id' => 'questionAdd', 'class' => 'user btn btn-primary']) ?>

<?php ActiveForm::end() ?>