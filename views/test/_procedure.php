<?php
use yii\helpers\Url;

?>

<?php if ($question): ?>
    <h1>Обучение <?= $question->test->label ?></h1>
    <p><?= $question->test->name?></p>
    <a class="js_test next" href="<?= Url::toRoute(['test/procedure-next', 'testId' => $question->test_id]) ?>"
       data-url='test/procedure-next' data-id="<?= $question->test_id ?>">
        Продолжить
    </a>
    <div id="link">
        <?= '[ ' . $question->link . ' ]' ?>
    </div>
    <div id="question">
        <?= $question->question ?>
    </div>
    <div id="answer" class="procedure">
        <?= $question->answer ?>
    </div>
<?php else: ?>
    <h2>Вопросы кончились</h2>
<?php endif; ?>
