<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlatosRGuarniciones */

$this->title = 'Create Platos R Guarniciones';
$this->params['breadcrumbs'][] = ['label' => 'Platos R Guarniciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="platos-rguarniciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
