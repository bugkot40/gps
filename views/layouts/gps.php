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
    <ul>
        <?php foreach ($pss as $ps): ?>
            <li class="">
                <a class="js_gps" href="<?= Url::toRoute(['gps/gps', 'psId' => $ps['id']]) ?>"
                   data-id="<?= $ps['id'] ?>">
                    <?= $ps['label'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a class="" href="<?= Url::toRoute(['test/index']) ?>">Перейти в раздел ТЕСТЫ</a>

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
