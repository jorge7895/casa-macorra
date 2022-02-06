<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "platos_r_comandas".
 *
 * @property int $id
 * @property int|null $id_plato
 * @property int|null $id_comanda
 * @property int|null $cantidad
 *
 * @property Comandas $comanda
 * @property Platos $plato
 */
class PlatosRComandas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'platos_r_comandas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_plato', 'id_comanda', 'cantidad'], 'integer'],
            [['id_plato', 'id_comanda'], 'unique', 'targetAttribute' => ['id_plato', 'id_comanda']],
            [['id_comanda'], 'exist', 'skipOnError' => true, 'targetClass' => Comandas::className(), 'targetAttribute' => ['id_comanda' => 'id']],
            [['id_plato'], 'exist', 'skipOnError' => true, 'targetClass' => Platos::className(), 'targetAttribute' => ['id_plato' => 'id']],
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
            'id_comanda' => 'Id Comanda',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * Gets query for [[Comanda]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComanda()
    {
        return $this->hasOne(Comandas::className(), ['id' => 'id_comanda']);
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
}
