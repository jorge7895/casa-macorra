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
            <div class="col-1">
                <p class="h5 text-muted m-0 align-middle">Nombre:</p>
            </div>
            <div class="col-4">
                <p class="h5 text-left m-0"> <?= $model->nombre ?></p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 text-left">
                <h5 class="text-muted">Ingredientes:</h5>
                <p class="m-0">
                   <?= implode('</p><p class="m-0">',ArrayHelper::getColumn($model->productos,'nombre'))?>
                </p>
            </div>
            <div class="col-3">
                <h5 class="text-muted text-right">Gramos:</h5>
                <p class="m-0 text-right">
                    <?= implode('</p><p class="m-0 text-right">',ArrayHelper::getColumn($model->productosEnGuarniciones,'gramos_producto'))?>
                </p>
            </div>
            <div class="col-3">
                <h5 class="text-muted text-right">Pvp:</h5>
                <p class="m-0 text-right">
                    
                    <?php 
                        $precio = ArrayHelper::getColumn($model->productos,'precio_compra');
                        $gproducto = ArrayHelper::getColumn($model->productosEnGuarniciones,'gramos_producto');
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
        <div class="co-12">
            <?= Html::a('Añadir ingredientes...', ['productos-en-guarniciones/createid','guarnicion'=>$model->id], ['class' => '']) ?>
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