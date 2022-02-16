<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property float|null $stock
 * @property string|null $nombre
 * @property float|null $precio_compra
 *
 * @property Pedidos[] $pedidos
 * @property ProductosDeProveedores[] $productosDeProveedores
 * @property ProductosEnGuarniciones[] $productosEnGuarniciones
 * @property ProductosEnPlatos[] $productosEnPlatos
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stock', 'precio_compra'], 'number'],
            [['nombre'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stock' => 'Stock',
            'nombre' => 'Nombre',
            'precio_compra' => 'Precio Compra',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['id_producto' => 'id']);
    }

    /**
     * Gets query for [[ProductosDeProveedores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosDeProveedores()
    {
        return $this->hasMany(ProductosDeProveedores::className(), ['id_producto' => 'id']);
    }

    /**
     * Gets query for [[ProductosEnGuarniciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosEnGuarniciones()
    {
        return $this->hasMany(ProductosEnGuarniciones::className(), ['id_producto' => 'id']);
    }

    /**
     * Gets query for [[ProductosEnPlatos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosEnPlatos()
    {
        return $this->hasMany(ProductosEnPlatos::className(), ['id_producto' => 'id']);
    }
}