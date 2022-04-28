<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use kartik\icons\Icon;
use kartik\grid\GridView;

Icon::map($this, Icon::FA);

$model = new \app\models\Categorias;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Casa Macorra - Categorías';
?>
<div class="categorias-index">
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
            <?php 
                     
                $gridColumns = [
                [
                    'class'=>'kartik\grid\SerialColumn',
                    'contentOptions'=>['class'=>'kartik-sheet-style'],
                    'width'=>'36px',
                    'pageSummary'=>'Total',
                    'pageSummaryOptions' => ['colspan' => 6],
                    'header'=>'',
                    'headerOptions'=>['class'=>'kartik-sheet-style']
                ],
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'Categoria',
                    'vAlign' => 'middle',
                    'width' => '210px',
                    'editableOptions' =>  function ($model, $key, $index){
                        return [
                            'header' => 'Nombre', 
                            'size' => 'md',
                        ];
                    }
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'dropdown' => 'dropdown',
                    'dropdownOptions' => ['class' => 'float-right'],
                    'urlCreator' => function($action, $model, $key, $index) { 
                        return Url::toRoute([$action, 'id' => $model->id]); 
                    },
                    'viewOptions' => ['title' => 'Ver en detalle', 'data-toggle' => 'tooltip'],
                    'updateOptions' => ['title' => 'Modificar registro', 'data-toggle' => 'tooltip'],
                    'deleteOptions' => ['title' => 'Eliminar', 'data-toggle' => 'tooltip'],
                    'headerOptions' => ['class' => 'kartik-sheet-style'],
                ],
                ];
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumns,
                'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
                'beforeHeader'=>[
                    [
                        'options'=>['class'=>'skip-export'] // remove this row from export
                    ]
                ],
                'toolbar' =>  [
                    ['content'=>
                        Html::button("Añadir categoria ".Icon::show('pen', ['class' => 'fa-solid', 'framework' => Icon::FAS]),['value'=>Url::to(['categorias/create']),'class' => 'buttonmodal shadow lift btn-sm btn-primary','id'=>'#modalButton0']),
                        Html::button('<i class="fas fa-plus"></i> Añadir', ['type'=>'button', 'title'=>'Añadir', 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
                        Html::a('&lt;i class="glyphicon glyphicon-repeat">&lt;/i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
                    ],
                    '{export}',
                    '{toggleData}'
                ],
                'pjax' => true,
                'bordered' => true,
                'striped' => false,
                'condensed' => false,
                'responsive' => true,
                'hover' => true,
                'floatHeader' => true,
                'showPageSummary' => false,
                'panel' => [
                    'heading'=>'<h3 class="panel-title"><i class="far fa-edit"></i> Categorias</h3>',
                    'headingOptions'=>['class'=>'panel-heading table-color rounded-top'],
                ],
            ]);
                            
            ?>
        </div>
    </div>

</div>
