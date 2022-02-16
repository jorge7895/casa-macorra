<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosEnPlatos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-en-platos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_plato')->textInput() ?>

    <?= $form->field($model, 'id_producto')->textInput() ?>

    <?= $form->field($model, 'gramos_producto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
