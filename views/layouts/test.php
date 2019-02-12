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

<div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Выпадающая ссылка
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
	  <ul>
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
	  </ul>
  </div>
</div>



<div class="wrap">
	 <ul>
        <?php foreach ($tests as $test): ?>
            <li class="js_start">
                <a class="js_test" href="<?= Url::toRoute(['test/procedure', 'testId' => $test['id']]) ?>"
                   data-url='test/procedure' data-id="<?= $test['id'] ?>">
                    <?= $test['name'] ?>
                </a>

                <a class="js_test" href="<?= Url::toRoute(['test/test', 'testId' => $test['id']]) ?>"
                   data-url='test/test' data-id="<?= $test['id'] ?>">
                    <?= 'Перемешать' ?>
                </a>

                <a class="menu" href="<?= Url::toRoute(['test/question-add', 'testId' => $test['id']]) ?>">
                    <?= 'Добавить' ?>
                </a>
            </li>
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
    <a class="" href="<?= \yii\helpers\Url::toRoute(['gps/index']) ?>">Перейти в раздел ГПС-370</a>

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
