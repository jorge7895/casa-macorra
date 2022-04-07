<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosEnPlatos */

//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Productos En Platos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="productos-en-platos-view">

    <h1><?= implode($model->getNombreProducto($model->id_producto)) ?></h1>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'id_plato',
//            'id_producto',
            'gramos_producto',
        ],
    ]) ?>
    
    <p>
        <?= Html::a('Actualizar cantidades', ['update2', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quieres eliminar el ingrediente?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
