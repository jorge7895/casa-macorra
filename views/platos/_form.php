<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$modelProductos = new app\models\ProductosEnPlatos;

/* @var $this yii\web\View */
/* @var $model app\models\Platos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="platos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria')->dropDownList($model->getdropdownCategoria()) ?>

    <?= $form->field($model, 'precio_publico')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'shadow lift btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
