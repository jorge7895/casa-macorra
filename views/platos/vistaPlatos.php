<?php

use yii\widgets\ListView;

?>





<div class="">     
        <?= ListView::widget([
        'dataProvider'=>$dataProvider,
        'itemView'=>'_vistaPlatos',
        'layout'=>"{summary}\n{pager}\n{items}",
        'itemOptions'=>['class'=>'col-md-6']
        ]);?>
</div>
      

