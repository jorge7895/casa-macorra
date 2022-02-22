<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidos-index">
    <div class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-end row">
                    <div class="col">
                        <h1 class="header-titulo">Pedidos</h1>
                    </div>
                    <div class="col-auto">
                    <?= Html::button("Añadir pedido ".Icon::show('pen', ['class' => 'fa-solid', 'framework' => Icon::FAS]),['value'=>Url::to(['../pedidos/create']),'class' => 'shadow lift btn btn-primary','id'=>'modalButton']) ?>
                    <?php
                        yii\bootstrap4\Modal::begin([
                           'id'     =>'modal',
                           'size'   =>'modal-md',
                           'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
                           ]);
                        echo "<div id='modalContent'> </div>";
                        yii\bootstrap4\Modal::end();
                    ?>
                    </div>
                </div>
            </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha',
            'id_producto',
            'id_proveedor',
            'descuento',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pedidos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
        </div>
    </div>            
</div>
