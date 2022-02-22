<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pedidos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'id_producto')->textInput()->dropDownList($model->getdropdownProducto()) ?>

    <?= $form->field($model, 'id_proveedor')->textInput()->dropDownList($model->getdropdownProveedor()) ?>

    <?= $form->field($model, 'descuento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
