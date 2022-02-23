<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

$model = new \app\models\Guarniciones;
?>

<div class="platos-index">
    <div class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-end row">
                    <div class="col">
                        <h1 class="header-titulo">Guarniciones</h1>
                    </div>
                    <div class="col-auto">
                    <?= Html::button("Añadir guarnición ".Icon::show('pen', ['class' => 'fa-solid', 'framework' => Icon::FAS]),['value'=>Url::to(['../guarniciones/create']),'class' => 'shadow lift btn btn-primary','id'=>'modalButton']) ?>
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
        <?= ListView::widget([
        'dataProvider'=>$dataProvider,
        'itemView'=>'_vistaGuarniciones',
        'summary'=>false,
        'options' => [
            'tag' => 'div',
            'class' => 'row',
        ],
        'layout'=>"{summary}\n{pager}\n{items}",
        'itemOptions'=>['tag' => 'div',
            'class' => 'p-4 col-lg-12 col-sm-12',]
        ]);?>
        </div>
    </div>
</div>