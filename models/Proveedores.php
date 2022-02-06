<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedores".
 *
 * @property int $id
 * @property string|null $nif
 * @property string $nombre
 *
 * @property Pedidos[] $pedidos
 * @property Productos[] $productos
 * @property ProductosRProveedores[] $productosRProveedores
 * @property TelefonosProveedores[] $telefonosProveedores
 */
class Proveedores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proveedores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nif'], 'string', 'max' => 9],
            [['nombre'], 'string', 'max' => 150],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nif' => 'Nif',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['id_proveedor' => 'id']);
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['id' => 'id_producto'])->viaTable('productos_r_proveedores', ['id_proveedor' => 'id']);
    }

    /**
     * Gets query for [[ProductosRProveedores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosRProveedores()
    {
        return $this->hasMany(ProductosRProveedores::className(), ['id_proveedor' => 'id']);
    }

    /**
     * Gets query for [[TelefonosProveedores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTelefonosProveedores()
    {
        return $this->hasMany(TelefonosProveedores::className(), ['id_proveedor' => 'id']);
    }
}
