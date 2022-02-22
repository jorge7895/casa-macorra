<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comandas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comandas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plato')->dropDownList($model->getdropdownPlato()) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'shadow lift btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
