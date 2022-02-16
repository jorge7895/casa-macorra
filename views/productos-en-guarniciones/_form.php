<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosEnGuarniciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-en-guarniciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_guarnicion')->textInput() ?>

    <?= $form->field($model, 'id_producto')->textInput() ?>

    <?= $form->field($model, 'gramos_producto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
