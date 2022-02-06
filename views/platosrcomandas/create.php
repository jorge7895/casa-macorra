<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlatosRComandas */

$this->title = 'Create Platos R Comandas';
$this->params['breadcrumbs'][] = ['label' => 'Platos R Comandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="platos-rcomandas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
