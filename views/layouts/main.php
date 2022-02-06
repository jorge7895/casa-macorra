<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>

</header>
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="">
        <?= Html::img('@web/images/logonav.png', ['alt' => 'My logo','class'=>'img-fluid']) ?>
        <ul class="list-unstyled">
        <li class="active nav-items">
            <?= Html::a(Icon::show('egg', ['class' => 'fa-solid nav-text', 'framework' => Icon::FAS]),['productos/index'])?>
            <?= Html::a('Productos',['productos/index'],['class' => 'nav-text text-uppercase'])?>
        </li>
        <li class="active nav-items">
            <a href="#"><span class="fa fa-user"></span> About</a>
        </li>
        <li class="active nav-items">
            <a href="#"><span class="fa fa-sticky-note"></span> Blog</a>
        </li>
        <li class="active nav-items">
            <a href="#"><span class="fa fa-cogs"></span> Services</a>
        </li>
        <li class="active nav-items">
            <a href="#"><span class="fa fa-paper-plane"></span> Contacts</a>
        </li>
        </ul>
    </nav>
    <div id="content" class="p-4 p-md-5">
            <?= $content ?>
    </div>
</div>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
