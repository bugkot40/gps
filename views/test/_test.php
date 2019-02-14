<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>


<?php if ($question): ?>
    <h1>Тест <?= $question->test->label ?></h1>
    <p><?= $question->test->name ?></p>
    <a class="js_test next" href="<?= Url::toRoute(['test/test-next', 'testId' => $question->test_id]) ?>"
       data-url='test/test-next' data-id="<?= $question->test_id ?>">
        Продолжить
    </a>
    <div id="link">
        <?= '[' . $question->link . ']' ?>
    </div>
    <div id="question">
        <?= $question->question ?>
    </div>
    <div id="vis"></div>
    <div id="vis_answer">
        <?= $question->answer ?>
    </div>
<?php else: ?>
    <h2>Вопросы кончились</h2>
<?php endif; ?>