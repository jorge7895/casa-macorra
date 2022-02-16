<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosDeProveedores */

$this->title = 'Create Productos De Proveedores';
$this->params['breadcrumbs'][] = ['label' => 'Productos De Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-de-proveedores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
