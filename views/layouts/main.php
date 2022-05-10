<?php

/* @var $this \yii\web\View */
/* @var $content string */
use app\assets\FontAsset;
use app\assets\AppAsset;
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
    <?= 
        Html::button(Icon::show('bars', ['class' => 'fa-solid', 'framework' => Icon::FAS]),['class' => 'burger-open-button shadow lift btn btn-primary','id'=>'open','onClick'=>'openBurger()'])
    ?>
    <?= 
        Html::button(Icon::show('home', ['class' => 'fa-solid', 'framework' => Icon::FAS]),['class' => 'burger-close-button shadow lift btn btn-primary','id'=>'close','onClick'=>'closeBurger()'])
    ?>
<div class="d-flex">

<aside class='leftbar' id='sidebar'>

        <nav id="menu-on">
            <?= Html::img('@web/images/logonav.png', ['alt' => 'Logo','class'=>'img-fluid pt-5 nav-big']) ?>
            <ul class="list-unstyled">
                <li class="active nav-items pt-3">
                    <?= 
                        Html::a(Icon::show('home', ['class' => 'fa-solid', 'framework' => Icon::FAS])."&nbsp;Vista General", ['site/index'], ['class' => 'nav-link nav-text text-uppercase pl-2 nav-big']),
                        Html::a(Icon::show('home', ['class' => 'fa-solid', 'framework' => Icon::FAS]), ['site/index'], ['class' => 'nav-link nav-text text-uppercase pl-1 nav-small'])
                    ?>
                </li>
                <li class="active nav-items ">
                    <?= 
                        Html::a(Icon::show('box-open', ['class' => 'fa-solid', 'framework' => Icon::FAS])."&nbsp;Productos  ".Icon::show('sort-down', ['class' => 'fa-solid', 'framework' => Icon::FAS]), ['site/index'], ['class' => 'nav-link nav-text text-uppercase pl-2 nav-big','data-toggle'=>'dropdown']),
                        Html::a(Icon::show('box-open', ['class' => 'fa-solid', 'framework' => Icon::FAS]), ['site/index'], ['class' => 'nav-link nav-text text-uppercase pl-1 nav-small','data-toggle'=>'dropdown'])
                     ?>
                    <div class="dropdown-menu">
                        <?= Html::a("Platos", ['platos/receta'], ['class' => 'dropdown-item']) ?>
                        <?= Html::a("Productos", ['productos/index'], ['class' => 'dropdown-item']) ?>
                        <?= Html::a("Guarniciones", ['guarniciones/guarnicion'], ['class' => 'dropdown-item']) ?>
                        <?= Html::a("Categorías", ['categorias/index'], ['class' => 'dropdown-item']) ?>
                    </div>
                </li>
                <li class="active nav-items">
                    <?= 
                        Html::a(Icon::show('edit', ['class' => 'fa-solid', 'framework' => Icon::FAS])."Comandas", ['comandas/index'], ['class' => 'nav-link nav-text text-uppercase pl-2 nav-big']),
                        Html::a(Icon::show('edit', ['class' => 'fa-solid', 'framework' => Icon::FAS]), ['comandas/index'], ['class' => 'nav-link nav-text text-uppercase pl-1 nav-small'])
                    ?>
                </li>
                <li class="active nav-items ">
                    <?= 
                        Html::a(Icon::show('shopping-cart', ['class' => 'fa-solid', 'framework' => Icon::FAS])."&nbsp;Pedidos", ['pedidos/index'], ['class' => 'nav-link nav-text text-uppercase pl-2 nav-big']),
                        Html::a(Icon::show('shopping-cart', ['class' => 'fa-solid', 'framework' => Icon::FAS]), ['pedidos/index'], ['class' => 'nav-link nav-text text-uppercase pl-1 nav-small'])
                    ?>
                </li>
                <li class="active nav-items ">
                    <?= 
                        Html::a(Icon::show('address-book', ['class' => 'fa-solid', 'framework' => Icon::FAS])."&nbsp;Proveedores", ['proveedores/index'], ['class' => 'nav-link nav-text text-uppercase pl-2 nav-big']),
                        Html::a(Icon::show('address-book', ['class' => 'fa-solid', 'framework' => Icon::FAS]), ['proveedores/index'], ['class' => 'nav-link nav-text text-uppercase pl-1 nav-small'])
                    ?>
                </li>
                <li class="active nav-items" id='active' onclick="contraer()" >
                    <label class='nav-link nav-text text-uppercase pl-2 nav-big'> <?=Icon::show('chevron-left', ['class' => 'fa-solid is-button', 'framework' => Icon::FAS]).'&nbsp;Contraer'?> </label>
                    <label class='nav-link nav-text text-uppercase pl-2 nav-small'> <?=Icon::show('chevron-right', ['class' => 'fa-solid is-button', 'framework' => Icon::FAS])?> </label>
                </li>
            </ul>
        </nav>
        </aside>
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
