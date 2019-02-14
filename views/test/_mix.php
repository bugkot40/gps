<?php
use yii\helpers\Url;

?>


<?php if ($question): ?>
    <h1>Супер-тест</h1>
    <p><?= $question->test->name?></p>
    <?php $test = $question->test; ?>
    <a class="js_test next" href="<?= Url::toRoute(['test/mix-next', 'mixId' => $test->mix_id]) ?>"
       data-url='test/mix-next' data-id="<?= $test->mix_id ?>">
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
