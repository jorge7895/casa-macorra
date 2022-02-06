<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comandas */

$this->title = 'Create Comandas';
$this->params['breadcrumbs'][] = ['label' => 'Comandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comandas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
