<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use yii\grid\GridView;
use kartik\icons\Icon;
use kartik\grid\GridView;
use kartik\grid\FormulaColumn;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Casa Macorra - Comandas';
?>
<div class="comandas-index">
    <div class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="rounded">
                    <?php

                        echo GridView::widget([
                            'id' => 'Comandas',
                            'dataProvider' => $dataProvider,
                            'columns' => $gridColumns, // las columnas a mostrar
                            'headerContainer' => ['class' => 'kv-table-header'], //El header de la tabla donde estan los nombres de los campos
                            'floatFooter' => false, // disable floating of table footer
                            'pjax' => false, // pjax is set to always false for this demo
                            'responsive' => true, 
                            'bordered' => true, // que los campos esten bordeados
                            'striped' => true, // una fila gris otra blanca
                            'condensed' => true, // ajusta mas la tabla
                            'hover' => true, // que se resalte cuando estamos encima
                            'showPageSummary' => false, // parte inferior de la tabla se puede usar para sumar campos por ejemplo creo
                            'pageSummaryContainer' => ['class' => 'kv-page-summary-container'],
                            'panel' => [ //propiedades generales de la tabla
                                'before'=>"",
                                'beforeOptions'=>['class'=>'kv-panel-before rounded'],
                                'type'=>'default',
                                'heading'=>'<h3 class="panel-title"><i class="far fa-edit"></i> Comandas</h3>',
                                'headingOptions'=>['class'=>'panel-heading table-color rounded-top'],
                                'after'=>'',
                                'afterOptions'=> ['class'=>'kv-panel-after'],
                                'footer'=>false,
                                'footerOptions'=>['class'=>'panel-footer']
                            ],
                            // set your toolbar
                            'toolbar' =>  [
                                Html::button(Icon::show('pen', ['class' => 'fa-solid', 'framework' => Icon::FAS])."Añadir comanda ",['value'=>Url::to(['comandas/create']),'class' => 'buttonmodal shadow lift btn btn-primary m-1','id'=>'modalButton0']),
                                Html::a('<i class="fas fa-redo"></i> Original', ['index'], ['class' => 'btn btn-secondary btn-default m-1']),
                                Html::a('Mes', ['mes'], ['class' => 'btn btn-secondary btn-default m-1']),
                                '{toggleData}',
                            ],
                            'toggleDataOptions'=>[
                                'all' => [
                                    'icon' => 'resize-full',
                                    'label' => 'All',
                                    'class' => 'btn btn-secondary btn-default',
                                    'title' => 'Show all data'
                                ],
                                'page' => [
                                    'icon' => 'resize-small',
                                    'label' => 'Page',
                                    'class' => 'btn btn-secondary btn-default',
                                    'title' => 'Show first page data'
                                ],
                            ],
                            'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
                            'persistResize' => true,
                            'toggleDataOptions' => ['minCount' => 10],
                            'itemLabelSingle' => 'Comanda',
                            'itemLabelPlural' => 'Comandas'
                        ]);
                    ?>
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
