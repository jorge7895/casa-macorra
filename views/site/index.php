<?php

/* @var $this yii\web\View */
use kartik\icons\Icon;
use yii\helpers\Html;
use yii\helpers\Url;


Icon::map($this, Icon::FA);

$model = new \app\models\Comandas;
$this->title = 'My Yii Application';
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
                    <?= Html::button("Añadir comanda ".Icon::show('pen', ['class' => 'fa-solid', 'framework' => Icon::FAS]),['value'=>Url::to(['../comandas/create']),'class' => 'shadow lift btn btn-primary','id'=>'modalButton']) ?>
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
                    <h4 class="card-header-title">Últimas comandas</h4>
                </div>
                <div class="table-responsive"></div>
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-header-title">Lo mas demandado</h4>
                </div>
                <div class="table-responsive"></div>
            </div>
        </div>
    </div>
</div>
