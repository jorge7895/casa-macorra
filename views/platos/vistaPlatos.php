<?php

use yii\widgets\ListView;

?>





<div class="">     
        <?= ListView::widget([
        'dataProvider'=>$dataProvider,
        'itemView'=>'_vistaPlatos',
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
      

