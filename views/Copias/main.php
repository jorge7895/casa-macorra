<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
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
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-light'],
    'items' => [
        ['label' => 'Noticias', 'url' => ['/site/noticias']],
        ['label' => 'Contacto', 'url' => ['/site/contact']],
        ['label' => 'Login', 'url' => ['/site/login']]
    ],
]); 
    NavBar::end();
    ?>
</header>
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="col-1">
        <h1><a href="index.html" class="logo">M.</a></h1>
        <ul class="list-unstyled components mb-5">
        <li class="active">
        <a href="#"><span class="fa fa-home"></span> Home</a>
        </li>
        <li>
        <a href="#"><span class="fa fa-user"></span> About</a>
        </li>
        <li>
        <a href="#"><span class="fa fa-sticky-note"></span> Blog</a>
        </li>
        <li>
        <a href="#"><span class="fa fa-cogs"></span> Services</a>
        </li>
        <li>
        <a href="#"><span class="fa fa-paper-plane"></span> Contacts</a>
        </li>
        </ul>
    </nav>
    <div class="col-10 main-content pb-6">
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
