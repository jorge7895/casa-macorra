<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosEnGuarniciones */

$this->title = 'Create Productos En Guarniciones';
$this->params['breadcrumbs'][] = ['label' => 'Productos En Guarniciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-en-guarniciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
