<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guarniciones_r_productos".
 *
 * @property int $id
 * @property int|null $id_guarnicion
 * @property int|null $id_producto
 * @property float|null $gramos_producto
 *
 * @property Guarniciones $guarnicion
 * @property Productos $producto
 */
class GuarnicionesRProductos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guarniciones_r_productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_guarnicion', 'id_producto'], 'integer'],
            [['gramos_producto'], 'number'],
            [['id_guarnicion', 'id_producto'], 'unique', 'targetAttribute' => ['id_guarnicion', 'id_producto']],
            [['id_guarnicion'], 'exist', 'skipOnError' => true, 'targetClass' => Guarniciones::className(), 'targetAttribute' => ['id_guarnicion' => 'id']],
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
            'id_guarnicion' => 'Id Guarnicion',
            'id_producto' => 'Id Producto',
            'gramos_producto' => 'Gramos Producto',
        ];
    }

    /**
     * Gets query for [[Guarnicion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuarnicion()
    {
        return $this->hasOne(Guarniciones::className(), ['id' => 'id_guarnicion']);
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
