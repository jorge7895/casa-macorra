<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Casa Macorra - Guarniciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guarniciones-index">
    <div class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-end row">
                    <div class="col">
                        <h1 class="header-titulo">Guarniciones</h1>
                    </div>
                    <div class="col-auto">
                    <?= Html::button("Crear guarnición ".Icon::show('pen', ['class' => 'fa-solid', 'framework' => Icon::FAS]),['value'=>Url::to(['guarniciones/create']),'class' => 'buttonmodal shadow lift btn btn-primary','id'=>'modalButton0']) ?>
                       
                    <?php
                        yii\bootstrap4\Modal::begin([
                           'id'     =>'modal0',
                           'size'   =>'modal-md',
                           'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
                           ]);
                        echo "<div id='modalContent0'> </div>";
                        yii\bootstrap4\Modal::end();
                    ?>
                    </div>
                </div>
            </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'nombre',
            'coste',
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
