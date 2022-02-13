<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Platos */

$this->title = 'Creación de nuevo plato';
?>
<div class="platos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
