<?php
 use yii\helpers\ArrayHelper;
 use yii\helpers\Html;
 use yii\helpers\Url;
 
 use kartik\icons\Icon;

Icon::map($this, Icon::FA);

?>


<div class="card shadow">
    <div class="card-header">
        <div class="row">
            <div class="col-4">
                <p class="h5 text-muted  align-middle">Nombre:</p>
                <p class="align-middle"> <?= $model->nombre ?></p>
            </div>
            <div class="col-4 text-center">
                <p class=" h5 text-muted">Categoria:</p>
                <p class=""> <?= $model->categoria0->nombre ?></p>
            </div>        
            <div class="col-4 text-right">
                <p class="h5 text-muted">Precio:</p>
                <p class=""> <?= $model->precio_publico."€" ?></p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 text-left">
                <h5 class="text-muted">Ingredientes:</h5>
                <p class="mx-3 mb-0">
                    <?php 
                    $idProd = ArrayHelper::getColumn($model->productosEnPlatos, 'id');
                    $nomProd = ArrayHelper::getColumn($model->productos,'nombre');
                        for ($i = 0; $i <= count($idProd)-1; $i++) {
                            echo '</p><p class="mx-3 mb-0">'.$nomProd[$i].' '.Html::button("Editar",['value'=>Url::to(['productos-en-platos/view','id'=>$idProd[$i]]),'class' => 'buttonmodal button-link','id'=>'#modalButton'.$idProd[$i], 'data-id'=>$idProd[$i]]);
                            
                            
                            yii\bootstrap4\Modal::begin([
                               'id'     =>'modal$idProd[$i]',
                               'size'   =>'modal-md',
                               'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
                               ]);
                            echo "<div id='modalContent$idProd[$i]'> </div>";
                            yii\bootstrap4\Modal::end();
                        }
                    ?>
                </p>
            </div>
            <div class="col-3">
                <h5 class="text-muted text-right">Gramos:</h5>
                <p class="m-0 text-right">
                    <?= implode('</p><p class="m-0 text-right">',ArrayHelper::getColumn($model->productosEnPlatos,'gramos_producto'))?>
                </p>
            </div>
            <div class="col-3">
                <h5 class="text-muted text-right">Pvp:</h5>
                <p class="m-0 text-right">
                    <?php 
                        $precio = ArrayHelper::getColumn($model->productos,'precio_compra');
                        $gproducto = ArrayHelper::getColumn($model->productosEnPlatos,'gramos_producto');
                        $calculo = 0;
                        $total = 0;
                        $coste[]=0;
                        if(count($gproducto)>0){
                                for($i=0;$i<count($gproducto);$i++){
                                    $calculo = ($precio[$i] * $gproducto[$i])/1000;
                                    $coste[$i] = number_format($calculo,2);
                                    $total += $coste[$i];
                            }
                        }

                    ?>
                    <?= implode('</p><p class="m-0 text-right">',$coste)?>
                </p>
            </div>
            
        </div>
        <div class="col-12">
            <?= Html::button("Añadir ingrediente",['value'=>Url::to(['../productos-en-platos/createid','plato'=>$model->id]),'class' => 'buttonmodal shadow lift btn-sm btn-primary','id'=>'#modalButton'.$model->id, 'data-id'=>$model->id]) ?>
            <?php
                yii\bootstrap4\Modal::begin([
                   'id'     =>"modal$model->id",
                   'size'   =>'modal-md',
                   'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
                   ]);
                echo "<div id='modalContent$model->id'> </div>";
                yii\bootstrap4\Modal::end();
            ?>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <p>Coste total:</p>
            </div>
            <div class="col-6 text-right">
                <?= number_format($total, 2)?>
            </div>
        </div>
        <div class="pt-4">
            <p class="text-right m-0">
            <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'head'=>'Confirmación',
                    'confirm' => '¿Estás seguro que quieres eliminar '.$this->title.'?',
                    'method' => 'post',
                ],
            ]) ?>
            </p>
        </div>
    </div>
</div>
