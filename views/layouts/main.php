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
            <?= Html::img('@web/images/logonav.png', ['alt' => 'Logo','class'=>'img-fluid pt-5']) ?>
            <ul class="list-unstyled">
            <li class="active nav-items pt-3">
                <a class="nav-link nav-text text-uppercase pl-2"role="button" href="../site/index">
                    <p class=""><?= Icon::show('home', ['class' => 'fa-solid', 'framework' => Icon::FAS])?> Vista general</p>
                </a>
            </li>
            <li class="active nav-items ">
                <a class="nav-link nav-text text-uppercase pl-2" data-toggle="dropdown" role="button">
                    <p class=""><?= Icon::show('box-open', ['class' => 'fa-solid', 'framework' => Icon::FAS]) ?> Productos <?= Icon::show('sort-down', ['class' => 'fa-solid', 'framework' => Icon::FAS]) ?></p>
                </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="../platos/index">Platos</a>
                <a class="dropdown-item" href="../productos/index">Productos</a>
                <a class="dropdown-item" href="../guarniciones/index">Guarniciones</a>
              </div>
            </li>
            <li class="active nav-items ">
                <a class="nav-link nav-text text-uppercase pl-2"role="button" href="../comandas/index">
                    <p class=""><?=Icon::show('edit', ['class' => 'fa-solid', 'framework' => Icon::FAS])?> Comandas</p>
                </a>
            </li>
            <li class="active nav-items ">
                <a class="nav-link nav-text text-uppercase pl-2"role="button" href="../pedidos/index">
                    <p class=""><?= Icon::show('shopping-cart', ['class' => 'fa-solid', 'framework' => Icon::FAS])?> Pedidos</p>
                </a>
            </li>
            <li class="active nav-items ">
                <a class="nav-link nav-text text-uppercase pl-2"role="button" href="../proveedores/index">
                    <p class=""><?= Icon::show('address-book', ['class' => 'fa-solid', 'framework' => Icon::FAS])?> Proveedores</p>
                </a>
            </li>

            </ul>
            
        </nav>
        
    </aside>
    <label for='toggle' class='buton-sidebar'> <?=Icon::show('chevron-left', ['class' => 'fa-solid is-button', 'framework' => Icon::FAS])?> </label>
    <div id="content" >


        <div class="container-fluid">
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container-fluid">
        
        <a class="float-left text-uppercase"role="button" href="../site/about">
            <p class=""><?= Icon::show('question-circle', ['class' => 'fa-solid', 'framework' => Icon::FAS])?> About</p>
        </a>
        <p class="float-right"><?= Yii::powered()?> por Jorge Pardo</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
