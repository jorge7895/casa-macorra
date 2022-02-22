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

<div class="d-flex">
    
    <input type='checkbox' id='toggle'></input>
    <aside class='leftbar'>
        
        <nav>
            <?= Html::img('@web/images/logonav.png', ['alt' => 'Logo','class'=>'img-fluid pt-5']) ?>
            <ul class="list-unstyled">
            <li class="active nav-items pt-3">
                <?= Html::a(Icon::show('home', ['class' => 'fa-solid', 'framework' => Icon::FAS])."Vista General", ['site/index'], ['class' => 'nav-link nav-text text-uppercase pl-2']) ?>
            </li>
            <li class="active nav-items ">
                <?= Html::a(Icon::show('box-open', ['class' => 'fa-solid', 'framework' => Icon::FAS])."Productos  ".Icon::show('sort-down', ['class' => 'fa-solid', 'framework' => Icon::FAS]), ['site/index'], ['class' => 'nav-link nav-text text-uppercase pl-2','data-toggle'=>'dropdown']) ?>
              <div class="dropdown-menu">
                  <?= Html::a("Platos", ['platos/receta'], ['class' => 'dropdown-item']) ?>
                  <?= Html::a("Productos", ['productos/index'], ['class' => 'dropdown-item']) ?>
                  <?= Html::a("Guarniciones", ['guarniciones/index'], ['class' => 'dropdown-item']) ?>
                  <?= Html::a("Categorias", ['categorias/index'], ['class' => 'dropdown-item']) ?>
              </div>
            </li>
            <li class="active nav-items ">
                <?= Html::a(Icon::show('edit', ['class' => 'fa-solid', 'framework' => Icon::FAS])."Comandas", ['comandas/index'], ['class' => 'nav-link nav-text text-uppercase pl-2']) ?>
            </li>
            <li class="active nav-items ">
                <?= Html::a(Icon::show('shopping-cart', ['class' => 'fa-solid', 'framework' => Icon::FAS])."Pedidos", ['pedidos/index'], ['class' => 'nav-link nav-text text-uppercase pl-2']) ?>
            </li>
            <li class="active nav-items ">
                <?= Html::a(Icon::show('address-book', ['class' => 'fa-solid', 'framework' => Icon::FAS])."Proveedores", ['proveedores/index'], ['class' => 'nav-link nav-text text-uppercase pl-2']) ?>
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
