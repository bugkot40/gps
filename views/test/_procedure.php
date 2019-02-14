<?php
use yii\helpers\Url;

?>
<h1>Обучение . <?= $question-> ?></h1>

<?php if ($question): ?>
    <a class="js_test" href="<?= Url::toRoute(['test/procedure-next', 'testId' => $question->test_id]) ?>"
       data-url='test/procedure-next' data-id="<?= $question->test_id ?>">
        Продолжить
    </a>

	<div id="link">
		<?='['. $question->link. ']' ?>
	</div>
	<div id="question">
		<?= $question->question ?>
	</div>
	<div id="answer">
		<?= $question->answer ?>
	</div>




<?php else: ?>
    <h2>Вопросы кончились</h2>
<?php endif; ?>
