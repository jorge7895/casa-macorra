<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Platos */


?>
<div class="platos-create">
    <div>
        <h1>Creación de plato</h1>
        <h5>Por favor rellene los campos y pulse guardar</h5>
    </div>
    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
