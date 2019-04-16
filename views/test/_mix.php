<?php
use yii\helpers\Url;
use yii\helpers\Html;

?>


<?php if ($question): ?>
    <h1>Супер-тест</h1>
    <p><?= $question->test->name ?></p>
    <?php $test = $question->test; ?>
    <a class="js_test next" href="<?= Url::toRoute(['test/mix-next', 'mixId' => $test->mix_id]) ?>"
       data-url='test/mix-next' data-id="<?= $test->mix_id ?>">
        Продолжить
    </a>
    <div id="link">
        <?= '[ ' . $question->link . ' ]' ?>
    </div>
    <div class="question">
        <?= $question->question ?>
    </div>
    <div id="vis" class="vis_close"></div>
    <div class="answer vis_answer">
        <?= $question->answer ?>
    </div>
    <?php if ($question->image) : ?>
        <div id="image">
            <?php $url = '@web/images/questions/' . $question->image ?>
            <?= Html::img($url, ['alt' => 'image', 'width' => '50%', 'position' => 'center-center']) ?>
        </div>
    <?php endif; ?>
<?php else: ?>
    <h2>Вопросы кончились</h2>
<?php endif; ?>
