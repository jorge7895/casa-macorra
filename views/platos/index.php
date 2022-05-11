<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\bs4dropdown\Dropdown;
use kartik\bs4dropdown\ButtonDropdown;
 use kartik\icons\Icon;

Icon::map($this, Icon::FA);

$model = new \app\models\Platos;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Casa Macorra - Platos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="platos-index">
    <div class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-end row">
                    <div class="col">
                        <h1 class="header-titulo">Platos</h1>
                    </div>
                    <div class="col-auto">
                    <?= Html::button("Añadir plato ".Icon::show('pen', ['class' => 'fa-solid', 'framework' => Icon::FAS]),['value'=>Url::to(['../platos/create']),'class' => 'shadow lift btn btn-primary','id'=>'modalButton']) ?>
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
            <div class="card-body">
    <?php Pjax::begin(); ?>
            <?php
                $gridColumns = [
                    [
                        'class'=>'kartik\grid\DataColumn',
                        'contentOptions'=>['class'=>'kartik-sheet-style'],
                        'width'=>'36px',
                        'attribute' => 'ingredientes',
                        'label'=>'Ingredientes',
                        'pageSummary'=>'Total',
                        'pageSummaryOptions' => ['colspan' => 2],
                        'hAlign' => 'center', 
                        'vAlign' => 'middle',
                    ],
                    [                
                        'class'=>'kartik\grid\DataColumn',
                        'contentOptions'=>['class'=>'kartik-sheet-style'],
                        'width'=>'36px',
                        'attribute' => 'gr',
                        'label'=>'Gramos',
                        'hAlign' => 'center', 
                        'vAlign' => 'middle',
                    ],
                    [
                        'class'=>'kartik\grid\DataColumn',
                        'contentOptions'=>['class'=>'kartik-sheet-style'],
                        'width'=>'36px',
                        'attribute' => 'precio',
                        'label'=>'Precio',
                        'pageSummary'=>true,
                        'pageSummaryOptions' => ['colspan' => 6],
                        'hAlign' => 'center', 
                        'vAlign' => 'middle',
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'dropdown' => 'dropdown',
                        'dropdownOptions' => ['class' => 'float-center'],
                        'urlCreator' => function($action, $model, $key, $index) { 
                            return Url::toRoute([$action, 'id' => $model['id']]); 
                        },
                        'viewOptions' => ['title' => 'Ver en detalle', 'data-toggle' => 'tooltip'],
                        'updateOptions' => ['title' => 'Modificar registro', 'data-toggle' => 'tooltip'],
                        'deleteOptions' => ['title' => 'Eliminar', 'data-toggle' => 'tooltip'],
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                    ],
                ];

                

                
                echo \kartik\grid\GridView::widget([
                        'dataProvider' => $ingredientes,
                        'columns' => $gridColumns,
                        'beforeHeader'=>[
                            [
                                'options'=>['class'=>'skip-export']
                            ]
                        ],
                        'toolbar' =>  [
                            'content' =>
                                Html::button("Crear proveedor ".Icon::show('pen', ['class' => 'fa-solid', 'framework' => Icon::FAS]),['value'=>Url::to(['proveedores/create']),'class' => 'buttonmodal shadow lift btn-sm btn-primary','id'=>'#modalButton0'])         
                        , 
                            'options' => ['class' => 'btn-group mr-2 me-2'],
                            '{export}',
                            '{toggleData}'
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
                        'pageSummaryContainer' => ['class' => 'kv-page-summary-container'],
                        'itemLabelSingle' => 'Proveedor',
                        'itemLabelPlural' => 'Proveedores',
                        'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
                        'persistResize' => false,
                        'toggleDataOptions' => ['minCount' => 10],
                        'panel' => [
                            'heading'=>'<h3 class="panel-title">'.Icon::show('address-book', ['class' => 'fa-solid', 'framework'=> Icon::FAS]).'&nbsp;&nbsp;Proveedores</h3>',
                            'headingOptions'=>['class'=>'panel-heading table-color rounded-top'],
                            'footer' => false,
                        ],
                ]);
                
            ?>
            <?php Pjax::end(); ?>
    </div>
</div>

        </div>
    </div>
</div>
