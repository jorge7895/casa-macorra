<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosEnPlatos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-en-platos-form">

    <?php $form = ActiveForm::begin(); ?>
                                                            <!--TODO-->
    <?= $form->field($model, 'id_plato')->dropDownList($model->getdropdownPlato(),['disable'=>'disable']) ?>

    <?= $form->field($model, 'id_producto')->dropDownList($model->getdropdownProducto()) ?>

    <?= $form->field($model, 'gramos_producto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'shadow lift btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
