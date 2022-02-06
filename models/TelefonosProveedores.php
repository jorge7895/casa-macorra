<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "telefonos_proveedores".
 *
 * @property int $id
 * @property int|null $id_proveedor
 * @property int|null $telefono
 *
 * @property Proveedores $proveedor
 */
class TelefonosProveedores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telefonos_proveedores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_proveedor', 'telefono'], 'integer'],
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
            'id_proveedor' => 'Id Proveedor',
            'telefono' => 'Telefono',
        ];
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
