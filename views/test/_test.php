<?php
use yii\helpers\Url;

?>
    <h1>Тест</h1>

<?php if ($question): ?>
    <a class="js_test" href="<?= Url::toRoute(['test/test-next', 'testId' => $question->test_id]) ?>"
       data-url='test/test-next' data-id="<?= $question->test_id ?>">
        Продолжить
    </a>
    <?php debug($question) ?>
<?php else: ?>
    <h2>Вопросы кончились</h2>
<?php endif; ?>