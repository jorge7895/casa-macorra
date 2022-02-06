<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property float|null $stock
 * @property string|null $nombre
 * @property int|null $id_pedido
 * @property float|null $precio_compra
 *
 * @property GuarnicionesRProductos[] $guarnicionesRProductos
 * @property Guarniciones[] $guarnicions
 * @property Pedidos $pedido
 * @property Platos[] $platos
 * @property PlatosRProductos[] $platosRProductos
 * @property ProductosRProveedores[] $productosRProveedores
 * @property Proveedores[] $proveedors
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
            [['id_pedido'], 'integer'],
            [['nombre'], 'string', 'max' => 200],
            [['id_pedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedidos::className(), 'targetAttribute' => ['id_pedido' => 'id']],
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
            'id_pedido' => 'Id Pedido',
            'precio_compra' => 'Precio Compra',
        ];
    }

    /**
     * Gets query for [[GuarnicionesRProductos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuarnicionesRProductos()
    {
        return $this->hasMany(GuarnicionesRProductos::className(), ['id_producto' => 'id']);
    }

    /**
     * Gets query for [[Guarnicions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuarnicions()
    {
        return $this->hasMany(Guarniciones::className(), ['id' => 'id_guarnicion'])->viaTable('guarniciones_r_productos', ['id_producto' => 'id']);
    }

    /**
     * Gets query for [[Pedido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedidos::className(), ['id' => 'id_pedido']);
    }

    /**
     * Gets query for [[Platos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatos()
    {
        return $this->hasMany(Platos::className(), ['id' => 'id_plato'])->viaTable('platos_r_productos', ['id_producto' => 'id']);
    }

    /**
     * Gets query for [[PlatosRProductos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatosRProductos()
    {
        return $this->hasMany(PlatosRProductos::className(), ['id_producto' => 'id']);
    }

    /**
     * Gets query for [[ProductosRProveedores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosRProveedores()
    {
        return $this->hasMany(ProductosRProveedores::className(), ['id_producto' => 'id']);
    }

    /**
     * Gets query for [[Proveedors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProveedors()
    {
        return $this->hasMany(Proveedores::className(), ['id' => 'id_proveedor'])->viaTable('productos_r_proveedores', ['id_producto' => 'id']);
    }
}
