<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GuarnicionesEnPlatos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guarniciones-en-platos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_plato')->textInput() ?>

    <?= $form->field($model, 'id_guarnicion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
