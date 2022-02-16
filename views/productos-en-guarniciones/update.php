<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosEnGuarniciones */

$this->title = 'Update Productos En Guarniciones: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productos En Guarniciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productos-en-guarniciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
