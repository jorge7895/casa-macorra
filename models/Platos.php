<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "platos".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $categoria
 * @property float|null $precio_publico
 * @property float|null $coste
 *
 * @property Comandas[] $comandas
 * @property Comandas[] $comandas0
 * @property Guarniciones[] $guarnicions
 * @property PlatosRComandas[] $platosRComandas
 * @property PlatosRGuarniciones[] $platosRGuarniciones
 * @property PlatosRProductos[] $platosRProductos
 * @property Productos[] $productos
 */
class Platos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'platos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['precio_publico', 'coste'], 'number'],
            [['nombre', 'categoria'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'categoria' => 'Categoria',
            'precio_publico' => 'Precio Publico',
            'coste' => 'Coste',
        ];
    }

    /**
     * Gets query for [[Comandas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComandas()
    {
        return $this->hasMany(Comandas::className(), ['id_plato' => 'id']);
    }

    /**
     * Gets query for [[Comandas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComandas0()
    {
        return $this->hasMany(Comandas::className(), ['id' => 'id_comanda'])->viaTable('platos_r_comandas', ['id_plato' => 'id']);
    }

    /**
     * Gets query for [[Guarnicions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuarnicions()
    {
        return $this->hasMany(Guarniciones::className(), ['id' => 'id_guarnicion'])->viaTable('platos_r_guarniciones', ['id_plato' => 'id']);
    }

    /**
     * Gets query for [[PlatosRComandas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatosRComandas()
    {
        return $this->hasMany(PlatosRComandas::className(), ['id_plato' => 'id']);
    }

    /**
     * Gets query for [[PlatosRGuarniciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatosRGuarniciones()
    {
        return $this->hasMany(PlatosRGuarniciones::className(), ['id_plato' => 'id']);
    }

    /**
     * Gets query for [[PlatosRProductos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatosRProductos()
    {
        return $this->hasMany(PlatosRProductos::className(), ['id_plato' => 'id']);
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['id' => 'id_producto'])->viaTable('platos_r_productos', ['id_plato' => 'id']);
    }
}
