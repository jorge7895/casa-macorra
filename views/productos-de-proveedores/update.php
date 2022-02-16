<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosDeProveedores */

$this->title = 'Update Productos De Proveedores: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productos De Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productos-de-proveedores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
