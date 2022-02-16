<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos_en_platos".
 *
 * @property int $id
 * @property int|null $id_plato
 * @property int|null $id_producto
 * @property float|null $gramos_producto
 *
 * @property Platos $plato
 * @property Productos $producto
 */
class ProductosEnPlatos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos_en_platos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_plato', 'id_producto'], 'integer'],
            [['gramos_producto'], 'number'],
            [['id_plato'], 'exist', 'skipOnError' => true, 'targetClass' => Platos::className(), 'targetAttribute' => ['id_plato' => 'id']],
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
            'id_plato' => 'Id Plato',
            'id_producto' => 'Id Producto',
            'gramos_producto' => 'Gramos Producto',
        ];
    }

    /**
     * Gets query for [[Plato]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlato()
    {
        return $this->hasOne(Platos::className(), ['id' => 'id_plato']);
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
}
