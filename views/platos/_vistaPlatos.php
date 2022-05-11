<?php
 use yii\helpers\ArrayHelper;
 use yii\helpers\Html;
 use yii\helpers\Url;
 
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\bs4dropdown\Dropdown;
use kartik\bs4dropdown\ButtonDropdown;
 use kartik\icons\Icon;

Icon::map($this, Icon::FA);

?>


<div class="card shadow">
    <div class="card-header">
        <div class="row">
            <div class="col-4">
                <p class="h5 text-muted  align-middle">Nombre:</p>
                <p class="align-middle"> </p>
            </div>
            <div class="col-4 text-center">
                <p class=" h5 text-muted">Categoria:</p>
                <p class=""> </p>
            </div>        
            <div class="col-4 text-right">
                <p class="h5 text-muted">Precio:</p>
                <p class=""> </p>
            </div>
        </div>
    </div>
    <div class="card-body">
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
