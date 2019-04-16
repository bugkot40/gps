<?php
use yii\helpers\Url;
use yii\helpers\Html;


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
    <div class="question">
        <?= $question->question ?>
    </div>
    <div class="answer" class="procedure">
        <?= $question->answer ?>
    </div>

	<?php if ($question->image) : ?>
	<div id="image_procedure">
		<?php $url = '@web/images/questions/'.$question->image ?>
		<?= Html::img($url, ['alt' => 'image', 'width' => '50%', 'class' => 'img']) ?>
	</div>
	<?php endif; ?>

<?php else: ?>
    <h2>Вопросы кончились</h2>
<?php endif; ?>
