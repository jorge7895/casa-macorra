<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Pedidos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Inserta fecha del pedido ...'],
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
    'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'yyyy/mm/dd'
    ]
    ]); ?>
    

    <?= $form->field($model, 'id_producto')->textInput()->dropDownList($model->getdropdownProducto()) ?>

    <?= $form->field($model, 'id_proveedor')->textInput()->dropDownList($model->getdropdownProveedor()) ?>

    <?= $form->field($model, 'descuento')->textInput() ?>
    
    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
