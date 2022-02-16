<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TelefonosProveedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="telefonos-proveedores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_proveedor')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
