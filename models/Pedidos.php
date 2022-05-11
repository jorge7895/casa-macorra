<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidos".
 *
 * @property int $id
 * @property string|null $fecha
 * @property int|null $id_producto
 * @property int|null $id_proveedor
 * @property int|null $descuento
 * @property int|null $cantidad
 *
 * @property Productos $producto
 * @property Proveedores $proveedor
 */
class Pedidos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['id_producto', 'id_proveedor'], 'integer'],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['id_producto' => 'id']],
            [['id_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedores::className(), 'targetAttribute' => ['id_proveedor' => 'id']],
            [['descuento'],'integer','min' => 0, 'max' => 100],
            [['cantidad'],'integer','min' => 0]


        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'id_producto' => 'Id Producto',
            'id_proveedor' => 'Id Proveedor',
            'descuento' => 'Descuento',
            'cantidad' => 'Cantidad',
        ];
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

    /**
     * Gets query for [[Proveedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProveedor()
    {
        return $this->hasOne(Proveedores::className(), ['id' => 'id_proveedor']);
    }
    
    public function getProveedorNombre()
    {
               return $this->hasMany(Proveedores::className(), ['id' => 'id_proveedor'])
                ->viaTable('proveedores', ['id_proveedor'=>'nombre']);
    }
    
    public function getdropdownProveedor(){
        $models = Proveedores::find()->asArray()->all();
        
        return \yii\helpers\ArrayHelper::map($models, 'id', 'nombre');
    }
    
    public function getdropdownProducto(){
        $models = Productos::find()->asArray()->all();
        
        return \yii\helpers\ArrayHelper::map($models, 'id', 'nombre');
    }
}
