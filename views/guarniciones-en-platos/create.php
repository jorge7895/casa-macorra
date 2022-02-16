<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GuarnicionesEnPlatos */

$this->title = 'Create Guarniciones En Platos';
$this->params['breadcrumbs'][] = ['label' => 'Guarniciones En Platos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guarniciones-en-platos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
