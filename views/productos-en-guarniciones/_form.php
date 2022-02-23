<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosEnGuarniciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-en-guarniciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_guarnicion')->dropDownList($model->getdropdownGuarniciones(),['hidden'=>'hidden']) ?>

    <?= $form->field($model, 'id_producto')->dropDownList($model->getdropdownProductos()) ?>

    <?= $form->field($model, 'gramos_producto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'shadow lift btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
