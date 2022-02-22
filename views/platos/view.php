<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Platos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Platos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="platos-view">

    <h1 class="text-center pt-3"><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'categoría',
            'precio_publico',
            'coste',
        ],
    ]) ?>

    <p class="text-right">
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'head'=>'Confirmación',
                'confirm' => '¿Estás seguro que quieres eliminar '.$this->title.'?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
