<?php
 use yii\helpers\ArrayHelper;
?>


<div class="card shadow">
    <div class="card-header">
        <ul class="list-inline">
            <li class="list-inline-item h5">Nombre:</li>
            <li class="list-inline-item"> <?= $model->nombre ?></li>
            <li class="list-inline-item h5">Categoria:</li>
            <li class="list-inline-item"> <?= $model->categoria0->nombre ?></li>
            <li class="list-inline-item h5">Precio:</li>
            <li class="list-inline-item"> <?= $model->precio_publico."€" ?></li>
        </ul>
    </div>
    <div class="card-body">
        <h5 class="text-muted">Ingredientes:</h5>
        <ul >
            <div class="row">
                <div class="p-3">
                    <li>
                        <?= implode('</li><li>',ArrayHelper::getColumn($model->productos,'nombre'))?>
                    </li>
                </div>
                <div class="p-3">
                    <ul>
                        <?= implode('</ul><ul>',ArrayHelper::getColumn($model->productosEnPlatos,'gramos_producto'))?>
                    </ul>
                </div>
            </div>    
        </ul>
        <h5 class="text-muted">Guarniciones:</h5>
    </div>
</div>