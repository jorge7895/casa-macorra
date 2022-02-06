<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GuarnicionesRProductos */

$this->title = 'Create Guarniciones R Productos';
$this->params['breadcrumbs'][] = ['label' => 'Guarniciones R Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guarniciones-rproductos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
