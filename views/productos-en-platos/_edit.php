<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosEnPlatos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-en-platos-form">

    <?php $form = ActiveForm::begin(); ?>
                                                           
    <?= $form->field($model, 'id_plato')->dropDownList($model->getdropdownPlato(),['hidden'=>'hidden']) ?>

    <?= $form->field($model, 'id_producto')->dropDownList($model->getdropdownProductoTotal(),['disabled'=>'disabled']) ?>

    <?= $form->field($model, 'gramos_producto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'shadow lift btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
