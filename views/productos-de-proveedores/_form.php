<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosDeProveedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-de-proveedores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_producto')->textInput() ?>

    <?= $form->field($model, 'id_proveedor')->textInput() ?>

    <?= $form->field($model, 'precio_compra')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
