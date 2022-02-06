<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Guarniciones */

$this->title = 'Update Guarniciones: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Guarniciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guarniciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
