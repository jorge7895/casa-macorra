<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosEnPlatos */

?>
<div class="productos-en-platos-create">

    <h1 class="text-center">Añadir ingrediente</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
