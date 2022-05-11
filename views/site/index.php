<?php

/* @var $this yii\web\View */
use kartik\icons\Icon;
use yii\helpers\Html;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
use yii\grid\ActionColumn;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\bs4dropdown\Dropdown;
use kartik\bs4dropdown\ButtonDropdown;

Icon::map($this, Icon::FA);

$this->title = 'Casa Macorra - Home';


?>
<div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-end row">
                <div class="col">
                    <h1 class="header-titulo">Vista general</h1>
                </div>
                <div class="col-auto">
                    <!--Boton que al pulsarlo nos abre un modal para añadir comandas-->
                    <?= Html::button("Añadir comanda ".Icon::show('pen', ['class' => 'fa-solid', 'framework' => Icon::FAS]),['value'=>Url::to(['comandas/create']),'class' => 'buttonmodal shadow lift btn btn-primary','id'=>'modalButton0']) ?>
                    
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
    </div>
</div>
<!--FIN DE LA CABEZERA O HEADER-->
<div class="container-fluid">
    <!--PRIMERA FILA CON LAS 4 TRAJETAS PEQUEÑAS-->
    <div class="row row-space">
        <!--CONTENEDOR 1-->
        <div class="col-xl col-md-6 col-12 ">
            <div class="card shadow-sm">
                <div class="card-body row col-12 cajon">
                    <div class="col-md-6">
                        <h4 class="text-uppercase text-muted text-left">Ventas Mensuales</h4>
                    </div>
                    <div class="col-md-6 cajon-datos">
                        <p class="mb-0"><?= intval($ventasMensuales[0]['total']).'&nbsp;'.Icon::show('euro-sign', ['class' => 'fa-solid icon-size text-muted', 'framework' => Icon::FAS]) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTENEDOR 2-->
        <div class="col-xl col-md-6 col-12 ">
            <div class="card shadow-sm">
                <div class="card-body row col-12 cajon">
                    <div class="col-md-6">
                        <h4 class="text-uppercase text-muted text-left">Gastos Mensuales</h4>
                    </div>
                    <div class="col-md-6 cajon-datos">
                        <p class="mb-0"><?= intval($gastosMensuales[0]['total']).'&nbsp;'.Icon::show('euro-sign', ['class' => 'fa-solid icon-size text-muted', 'framework' => Icon::FAS]) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTENEDOR 3-->
        <div class="col-xl col-md-6 col-12 ">
            <div class="card shadow-sm">
                <div class="card-body row col-12 cajon">
                    <div class="col-md-6">
                        <h4 class="text-uppercase text-muted text-left">Balance</h4>
                    </div>
                    <div class="col-md-6 cajon-datos">
                        <p class="mb-0"><?= intval($ventasMensuales[0]['total']-$gastosMensuales[0]['total']).'&nbsp;'.Icon::show('euro-sign', ['class' => 'fa-solid icon-size text-muted', 'framework' => Icon::FAS]) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--FIN DE LOS CONTENEDORES PEQUEÑOS-->
<!--INICIO DEL CONTENEDOR PARA ALOJAR LAS GRAFICAS-->
    <div class="row row-space">
        <div class="col-12">
            <div class="card shadow-sm">
                <?php Pjax::begin(); ?>
                    <?php
                        $gridColumns = [
                            [
                                'class'=>'kartik\grid\DataColumn',
                                'contentOptions'=>['class'=>'kartik-sheet-style'],
                                'width'=>'36px',
                                'attribute' => 'nombre',
                                'label'=>'Nombre',
                                'hAlign' => 'center', 
                                'vAlign' => 'middle',
                            ],
                            [                
                                'class'=>'kartik\grid\DataColumn',
                                'contentOptions'=>['class'=>'kartik-sheet-style'],
                                'width'=>'36px',
                                'attribute' => 'stock',
                                'label'=>'Stock disponible',
                                'hAlign' => 'center', 
                                'vAlign' => 'middle',
                            ]
                        ];
                                
                        echo \kartik\grid\GridView::widget([
                                'dataProvider' => $dataBajoStock,
                                'columns' => $gridColumns,
                                'beforeHeader'=>[
                                    [
                                        'options'=>['class'=>'skip-export'] // remove this row from export
                                    ]
                                ],
                                'toolbar' =>  [
                                    'options' => ['class' => 'btn-group mr-2 me-2'],
                                    '{export}'
                                ],
                                'exportConfig' => [
                                    'csv' => [],
                                    'json' => [],
                                ],
                                'pjax' => false,
                                'bordered' => true,
                                'striped' => true,
                                'condensed' => false,
                                'responsive' => true,
                                'hover' => true,
                                'floatHeader' => true,
                                'showPageSummary' => false,
                                'pageSummaryContainer' => false,
                                'itemLabelSingle' => 'Producto',
                                'itemLabelPlural' => 'Productos',
                                'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
                                'persistResize' => false,
                                'panel' => [
                                    'heading'=>'<h3 class="panel-title"><i class="fas fa-list"></i> Productos bajos de stock</h3>',
                                    'headingOptions'=>['class'=>'panel-heading table-color rounded-top'],
                                    'footer' => false,
                                ],
                        ]);
                    ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <?php
                    foreach($ingresos as $values){
                        $mes[] = ($values['mes']);
                        $euros[] = intval($values['cantidad']);
                    }
                    echo
                    Highcharts::widget([
                        'scripts' => ['modules'],
                        'options' => [
                            'chart' => ['type' => 'column'],
                            'title' => ['text' => 'Ventas'],
                            'xAxis' => ['categories' => $mes],
                            'yAxis' => ['title' => ['text' => 'Cantidad']],
                            'series' => [
                                [
                                   'name' => 'Mes',
                                   'color' => '#004139',
                                   'colorByPoint' => false,
                                   'data' => $euros,
                                ],
                            ],
                        ],
                    ]);
                    ?>
                </div>
                <div class="table-responsive"></div>
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <?php
                    foreach($masVendidos as $values){
                        $nombre[] = ($values['nombre']);
                        $cantidad[] = intval($values['cantidad']);
                    }
                    
                    echo
                    Highcharts::widget([
                        'scripts' => ['modules'],
                        'options' => [
                            'chart' => ['type' => 'column'],
                            'title' => ['text' => 'Más vendidos'],
                            'xAxis' => ['categories' => $nombre],
                            'yAxis' => ['title' => ['text' => 'Cantidad']],
                            'series' => [
                                [
                                   'name' => 'Nombre',
                                   'color' => '#004139',
                                   'data' => $cantidad,
                                ],
                            ],
                        ],
                    ]);
                    ?>
                </div>
                <div class="table-responsive"></div>
            </div>
        </div>
    </div>

</div>
