<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\User;

AppAsset::register($this);
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

<div class="container">
<nav class="navbar navbar-default" style="background-color: white;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Yii2Blog</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if(Yii::$app->user->isGuest): ?>
                <li><a href="<?= Url::toRoute(['auth/login']) ?>">Login</a></li>
                <li><a href="<?= Url::toRoute(['auth/singup']) ?>">Registration</a></li>
            <?php else: ?>
                <li><a href="<?= Url::toRoute(['auth/logout']) ?>">Выйти (<?=Yii::$app->user->identity->name?>)</a></li>
            <?php endif; ?>
            <?php if(Yii::$app->user->identity->isAdmin == 1): ?>
                <li><a href="<?= Url::toRoute(['admin/article']) ?>">Admin panel</a></li>
            <?php endif ?>
        </ul>
    </div>
</nav>
</div>

<!--main content start-->
<?= $content ?>
<!-- end main content-->


<footer class="footer">
    <div class="container">
        <p class="text-muted">Footer content</p>
    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
