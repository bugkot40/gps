<?php
use yii\helpers\Url;

?>

<h1>Микс</h1>

<?php if ($question): ?>
    <?php $test = $question->test; ?>
    <a class="js_test" href="<?= Url::toRoute(['test/mix-next', 'mixId' => $test->mix_id]) ?>"
       data-url='test/mix-next' data-id="<?= $test->mix_id ?>">
        Продолжить
    </a>
    <?php debug($question) ?>
<?php else: ?>
    <h2>Вопросы кончились</h2>
<?php endif; ?>
