<?php

/* @var $this \yii\web\View */
/* @var $content string */
use app\assets\FontAsset;
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);
FontAsset::register($this);
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

<div class="d-flex">
    
    <input type='checkbox' id='toggle'></input>
    <aside class='leftbar'>
        
        <nav>
            <?= Html::a(Html::img('@web/images/logonav.png', ['alt' => 'Logo','class'=>'img-fluid pt-5']), ['site/index']) ?>
            <ul class="list-unstyled">
            <li class="active nav-items text-center pt-3">
                <?= Html::a(Icon::show('shopping-cart', ['class' => 'fa-solid nav-text', 'framework' => Icon::FAS]),['productos/index'])?>
                <?= Html::a('Productos',['productos/index'],['class' => 'nav-text text-uppercase pl-2'])?>
            </li>
            <li class="active nav-items text-center pt-3">
                <?= Html::a(Icon::show('edit', ['class' => 'fa-solid nav-text', 'framework' => Icon::FAS]),['productos/index'])?>
                <?= Html::a('Comandas',['productos/index'],['class' => 'nav-text text-uppercase pl-2'])?>
            </li>
            <li class="active nav-items text-center pt-3">
                <?= Html::a(Icon::show('address-card', ['class' => 'fa-solid nav-text', 'framework' => Icon::FAS]),['productos/index'])?>
                <?= Html::a('Proveedores',['productos/index'],['class' => 'nav-text text-uppercase pl-2'])?>
            </li>
            <li class="active nav-items text-center pt-3">
                <?= Html::a(Icon::show('clipboard-list', ['class' => 'fa-solid nav-text', 'framework' => Icon::FAS]),['productos/index'])?>
                <?= Html::a('Pedidos',['productos/index'],['class' => 'nav-text text-uppercase pl-2'])?>
            </li>
            </ul>
            
        </nav>
        
    </aside>
    <label for='toggle' class='buton-sidebar'> <?=Icon::show('chevron-left', ['class' => 'fa-solid is-button', 'framework' => Icon::FAS])?> </label>
    <div id="content" >
            <?= $content ?>
    </div>
</div>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; Casa Macorra <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered()?> por Jorge Pardo</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
