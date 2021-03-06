<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "productos_en_guarniciones".
 *
 * @property int $id
 * @property int|null $id_guarnicion
 * @property int|null $id_producto
 * @property float|null $gramos_producto
 *
 * @property Guarniciones $guarnicion
 * @property Productos $producto
 */
class ProductosEnGuarniciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos_en_guarniciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_guarnicion', 'id_producto'], 'integer'],
            [['gramos_producto'], 'number','min' => 0],
            [['id_guarnicion'], 'exist', 'skipOnError' => true, 'targetClass' => Guarniciones::className(), 'targetAttribute' => ['id_guarnicion' => 'id']],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['id_producto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_guarnicion' => 'Guarnicion',
            'id_producto' => 'Producto',
            'gramos_producto' => 'Gramos Producto',
        ];
    }

    /**
     * Gets query for [[Guarnicion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuarnicion()
    {
        return $this->hasOne(Guarniciones::className(), ['id' => 'id_guarnicion']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::className(), ['id' => 'id_producto']);
    }
    
    public function getdropdownProductos(){
        $models = Productos::find()->where('id  not in (select id_producto from productos_en_guarniciones where id_guarnicion = '.$this->id_guarnicion.')' )->asArray()->all();
        
        return ArrayHelper::map($models, 'id', 'nombre');
    }
    
    public function getdropdownGuarniciones(){
        $models = Guarniciones::find()->asArray()->all();
        
        return ArrayHelper::map($models, 'id', 'nombre');
    }
}
