<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TelefonosProveedores */

$this->title = 'Create Telefonos Proveedores';
$this->params['breadcrumbs'][] = ['label' => 'Telefonos Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telefonos-proveedores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
