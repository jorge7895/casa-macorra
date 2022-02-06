<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GuarnicionesRProductos */

$this->title = 'Update Guarniciones R Productos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Guarniciones R Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guarniciones-rproductos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
