<?php

/* @var $this yii\web\View */
use kartik\icons\Icon;
use yii\helpers\Html;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;

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
        <div class="col-xl col-md-6 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted mb-2 text-left">Ventas totales</h6>
                    <div class="align-items-center row">
                        <div class="col">
                            <h2 class="mb-0">12.600</h2>
                        </div>
                        <div class="col-auto">
                            <?=Icon::show('euro-sign', ['class' => 'fa-solid icon-size text-muted', 'framework' => Icon::FAS])?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTENEDOR 2-->
        <div class="col-xl col-md-6 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted mb-2 text-left">Gastos totales</h6>
                    <div class="align-items-center row">
                        <div class="col">
                            <h2 class="mb-0">9.500</h2>
                        </div>
                        <div class="col-auto">
                            <?=Icon::show('euro-sign', ['class' => 'fa-solid icon-size text-muted', 'framework' => Icon::FAS])?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTENEDOR 3-->
        <div class="col-xl col-md-6 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted mb-2 text-left">Ventas mensuales</h6>
                    <div class="align-items-center row">
                        <div class="col">
                            <h2 class="mb-0">2.800</h2>
                        </div>
                        <div class="col-auto">
                            <?=Icon::show('euro-sign', ['class' => 'fa-solid icon-size text-muted', 'framework' => Icon::FAS])?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTENEDOR 4-->
        <div class="col-xl col-md-6 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted mb-2 text-left">Gastos mensuales</h6>
                    <div class="align-items-center row">
                        <div class="col">
                            <h2 class="mb-0">1.200</h2>
                        </div>
                        <div class="col-auto">
                            <?=Icon::show('euro-sign', ['class' => 'fa-solid icon-size text-muted', 'framework' => Icon::FAS])?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--FIN DE LOS CONTENEDORES PEQUEÑOS-->
<!--INICIO DEL CONTENEDOR PARA ALOJAR LA TABLA CON LAS ULTIMAS COMANDAS-->
    <div class="row row-space">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-header-title">Productos bajos de stock</h4>
                </div>
                <div class="table-responsive">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <?php
                    
                    $ventas[] = [ 'name' => 'Enero', 'y' => 1000];
                    $ventas[] = [ 'name' => 'Febrero', 'y' => 700];
                    $ventas[] = [ 'name' => 'Marzo', 'y' => 1200];
                    $ventas[] = [ 'name' => 'Abril', 'y' => 960];
                    $ventas[] = [ 'name' => 'Mayo', 'y' => 880];
                    $ventas[] = [ 'name' => 'Junio', 'y' => 720];
                    $ventas[] = [ 'name' => 'Julio', 'y' => 1100];
                    $ventas[] = [ 'name' => 'Agosto', 'y' => 1300];
                    $ventas[] = [ 'name' => 'Septiembre', 'y' => 910];
                    $ventas[] = [ 'name' => 'Octubre', 'y' => 1070];
                    $ventas[] = [ 'name' => 'Noviembre', 'y' => 910];
                    $ventas[] = [ 'name' => 'Diciembre', 'y' => 970];
                    echo
                        Highcharts::widget([
                                'scripts' => ['modules'],
                                'options' => [
                                    'chart' => ['type' => 'column'],
                                    'title' => ['text' => 'Ingresos mensuales'],
                                    'xAxis' => ['title' => ['text' => 'Mes']],
                                    'yAxis' => ['title' => ['text' => 'Unidades']],
                                    'credits' => ['enabled' => false],
                                    'series' => [
                                        [
                                           'color'=>'#004139',
                                           'name' => 'Ingresos',
                                           'data' => $ventas,
                                        ],
                                    ],
                                ]
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
                    $masVendidos[] = [ 'name' => 'Surtido de ibéricos', 'y' => 10];
                    $masVendidos[] = [ 'name' => 'Patatas bravas', 'y' => 7];
                    echo
                        Highcharts::widget([
                                'scripts' => ['modules'],
                                'options' => [
                                    'chart' => ['type' => 'column'],
                                    'title' => ['text' => "Productos más demandados"],
                                    'xAxis' => ['type' => 'Plato'],
                                    'yAxis' => ['title' => ['text' => 'Unidades']],
                                    'credits' => ['enabled' => false],
                                    'series' => [
                                        [
                                           'name' => 'Undidades vendidas',
                                           'color'=>'#004139',
                                           'data' => $masVendidos
                                        ],
                                    ],
                                ]
                            ]);
                    ?>
                </div>
                <div class="table-responsive"></div>
            </div>
        </div>
    </div>
</div>
