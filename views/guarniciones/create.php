<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Guarniciones */

$this->title = 'Create Guarniciones';
$this->params['breadcrumbs'][] = ['label' => 'Guarniciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guarniciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
