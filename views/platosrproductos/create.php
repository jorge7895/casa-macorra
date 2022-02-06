<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlatosRProductos */

$this->title = 'Create Platos R Productos';
$this->params['breadcrumbs'][] = ['label' => 'Platos R Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="platos-rproductos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
