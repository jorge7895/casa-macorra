<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosEnPlatos */

$this->title = 'Create Productos En Platos';
$this->params['breadcrumbs'][] = ['label' => 'Productos En Platos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-en-platos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
