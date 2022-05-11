<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use kartik\grid\GridView;
use kartik\bs4dropdown\Dropdown;
use kartik\bs4dropdown\ButtonDropdown;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProveedoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
yii\bootstrap4\Modal::begin([
    'id'     =>"modal0",
    'size'   =>'modal-md',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
    ]);
    echo "<div id='modalContent0'> </div>";
    yii\bootstrap4\Modal::end();
?>
<div class="row row-space pt-3">
    <div class="col-12">
        <div class="card shadow-sm m-3">
            <?php Pjax::begin(); ?>
            <?php
                echo \kartik\grid\GridView::widget([
                        'dataProvider' => $dataProvider,
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
