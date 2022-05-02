<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\Pjax;

use kartik\icons\Icon;
use kartik\grid\GridView;
use kartik\bs4dropdown\Dropdown;
use kartik\bs4dropdown\ButtonDropdown;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Casa Macorra - Comandas';
?>
<div class="comandas-index">
    <div class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-end row">
                    <div class="col-auto">
                        
                    
                        <?php
                            yii\bootstrap4\Modal::begin([
                            'id'     =>"modal0",
                            'size'   =>'modal-md',
                            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
                            ]);
                            echo "<div id='modalContent0'> </div>";
                            yii\bootstrap4\Modal::end();
                        ?>
           
                    </div>
                </div>
            </div>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php

                
        echo \kartik\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                //'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
                'beforeHeader'=>[
                    [
                        'options'=>['class'=>'skip-export'] // remove this row from export
                    ]
                ],
                'toolbar' =>  [
                    'content' =>
                        Html::button("Añadir comanda ".Icon::show('pen', ['class' => 'fa-solid', 'framework' => Icon::FAS]),['value'=>Url::to(['categorias/create']),'class' => 'buttonmodal shadow lift btn-sm btn-primary','id'=>'#modalButton0']) . ' '.
                        Html::a('Mes', ['mes'], ['class' => 'btn btn-outline-secondary','title'=>('Mes')]). ' '.
                        Html::a('Año', ['year'], ['class' => 'btn btn-outline-secondary','title'=>('Año')]). ' '.
                        Html::a('<i class="fas fa-redo"></i>', ['index'], ['class' => 'btn btn-outline-secondary','title'=>('Reset Grid'),'data-pjax' => 0, 
                        
                ]), 
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
                'showPageSummary' => true,
                'pageSummaryContainer' => ['class' => 'kv-page-summary-container'],
                'itemLabelSingle' => 'Categoría',
                'itemLabelPlural' => 'Categorías',
                'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
                'persistResize' => false,
                'toggleDataOptions' => ['minCount' => 10],
                'panel' => [
                    'heading'=>'<h3 class="panel-title"><i class="fas fa-list"></i> Categorías</h3>',
                    'headingOptions'=>['class'=>'panel-heading table-color rounded-top'],
                ],
        ]);
    ?>
    

    <?php Pjax::end(); ?>

        </div>
    </div>

</div>
