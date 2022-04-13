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
    public $telefonos;
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
            [['nombre'], 'string', 'max' => 200],
            [['nombre'], 'match','pattern'=>'/^[a-z,.\s-]+$/i'],
            [['nif'], 'string', 'max' => 9],
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
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['id_proveedor' => 'id']);
    }

    /**
     * Gets query for [[ProductosDeProveedores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosDeProveedores()
    {
        return $this->hasMany(ProductosDeProveedores::className(), ['id_proveedor' => 'id']);
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
