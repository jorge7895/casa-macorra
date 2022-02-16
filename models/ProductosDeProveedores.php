<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos_de_proveedores".
 *
 * @property int $id
 * @property int|null $id_producto
 * @property int|null $id_proveedor
 * @property float|null $precio_compra
 *
 * @property Productos $producto
 * @property Proveedores $proveedor
 */
class ProductosDeProveedores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos_de_proveedores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto', 'id_proveedor'], 'integer'],
            [['precio_compra'], 'number'],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['id_producto' => 'id']],
            [['id_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedores::className(), 'targetAttribute' => ['id_proveedor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_producto' => 'Id Producto',
            'id_proveedor' => 'Id Proveedor',
            'precio_compra' => 'Precio Compra',
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
}
