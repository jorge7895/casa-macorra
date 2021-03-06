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
 * @property ProductosDeProveedores[] $productosDeProveedores
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
            [['nombre'], 'string', 'max' => 200],
            [['nombre'], 'match','pattern'=>'/^[a-z,.\s-]+$/i'],
            [['nif'],'match', 'pattern'=>'/^[0-9]{8}[A-Z]{1}/i']
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
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['id_proveedor' => 'id']);
    }

    /**
     * Gets query for [[ProductosDeProveedores]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getProductosDeProveedores()
    {
        return $this->hasMany(ProductosDeProveedores::className(), ['id_proveedor' => 'id']);
    }

    /**
     * Gets query for [[TelefonosProveedores]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getTelefonosProveedores()
    {
        return $this->hasMany(TelefonosProveedores::className(), ['id_proveedor' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProveedoresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProveedoresQuery(get_called_class());
    }
}
