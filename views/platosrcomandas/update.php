<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlatosRComandas */

$this->title = 'Update Platos R Comandas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Platos R Comandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="platos-rcomandas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
