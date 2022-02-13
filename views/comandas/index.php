<?php


use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

Icon::map($this, Icon::FA);

$model = new \app\models\Comandas;
?>
<div class="comandas-index">
    <div class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-end row">
                    <div class="col">
                        <h1 class="header-titulo">Comandas</h1>
                    </div>
                    <div class="col-auto">
                        <?php
                        /*
                        aqui creamos un boton que nos abre un modal (ventana emergente) que nos permite crear platos
                        */
                            yii\bootstrap4\Modal::begin([
                                'id'=>'modal',
                                'size'=>'modal-lg',
                                'toggleButton' => (['label' => 'Añadir comanda','class' => 'shadow lift btn btn-primary']),
                            ]);

                            echo $this->renderAjax('create',['model'=>$model]);
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
            'precio_total',
            'id_plato',
            'cantidad',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


        </div>
    </div>
</div>
