<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAssetGps;
use app\assets\ltAppAsset;
use yii\helpers\Url;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

AppAssetGps::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php $menu = \app\classes\ContentGenerator::getMenu(); ?>

<?php $pss = $menu['ps']; ?>
<?php $tests = $menu['test']; ?>
<div class="wrap">
    <div id="close">
        <?= Html::img("@web/images/close.png", ['alt' => 'close', 'width' => '25px']) ?>
    </div>
    <ul>
        <?php foreach ($tests as $test): ?>
            <?php if ($test['mix_id'] == null): ?>
                <li class="js_start base">
            <?php else: ?>
                <li class="js_start">
            <?php endif; ?>
            <a class="js_test" href="<?= Url::toRoute(['test/procedure', 'testId' => $test['id']]) ?>"
               data-url='test/procedure' data-id="<?= $test['id'] ?>">
                <?= $test['label'] ?>
            </a>

            <a class="js_test" href="<?= Url::toRoute(['test/test', 'testId' => $test['id']]) ?>"
               data-url='test/test' data-id="<?= $test['id'] ?>">
                <?= Html::img("@web/images/mix.png", ['alt' => 'mix', 'width' => '20px']) ?>
            </a>

            <a class="menu" href="<?= Url::toRoute(['test/question-add', 'testId' => $test['id']]) ?>">
                <?= Html::img("@web/images/add.png", ['alt' => '+', 'width' => '20px']) ?>
            </a>
            <div class="archive">
                <?= Html::img("@web/images/archive.png", ['alt' => '?', 'width' => '20px']) ?>
            </div>
            </li>
            <div class='archiveQuestion'>
                <?php foreach ($test['questions'] as $key => $question): ?>
                    <p class='question'>Вопрос <?= $key + 1 ?>. <?= $question['question'] ?> </p>
                    <p class='answer'> <?= $question['answer'] ?></p>
                    <?php if ($question['image']): ?>
                        <?php $img = $question['image']; ?>
                        <?= Html::img("@web/images/questions/$img", ['alt' => 'images', 'width' => '50%', 'class' => 'img']) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php $list = NULL ?>
        <?php endforeach; ?>


        <li class="js_start">
            <a class="js_test" href="<?= Url::toRoute(['test/mix', 'mixId' => 1]) ?>"
               data-url='test/mix' data-id="<?= 1 ?>">
                <?= 'Микс НТД' ?>
            </a>
        </li>
        <li class="js_start">
            <a class="js_test" href="<?= Url::toRoute(['test/mix', 'mixId' => 2]) ?>"
               data-url='test/mix' data-id="<?= 2 ?>">
                <?= 'Микс РЗА' ?>
            </a>
        </li>
    </ul>
    <a class="get" href="<?= \yii\helpers\Url::toRoute(['gps/index']) ?>">Перейти в раздел ГПС-370</a>

    <div class="container">
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
