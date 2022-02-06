<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guarniciones".
 *
 * @property int $id
 * @property string $nombre
 * @property float|null $coste
 *
 * @property GuarnicionesRProductos[] $guarnicionesRProductos
 * @property Platos[] $platos
 * @property PlatosRGuarniciones[] $platosRGuarniciones
 * @property Productos[] $productos
 */
class Guarniciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guarniciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['coste'], 'number'],
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
            'nombre' => 'Nombre',
            'coste' => 'Coste',
        ];
    }

    /**
     * Gets query for [[GuarnicionesRProductos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuarnicionesRProductos()
    {
        return $this->hasMany(GuarnicionesRProductos::className(), ['id_guarnicion' => 'id']);
    }

    /**
     * Gets query for [[Platos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatos()
    {
        return $this->hasMany(Platos::className(), ['id' => 'id_plato'])->viaTable('platos_r_guarniciones', ['id_guarnicion' => 'id']);
    }

    /**
     * Gets query for [[PlatosRGuarniciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatosRGuarniciones()
    {
        return $this->hasMany(PlatosRGuarniciones::className(), ['id_guarnicion' => 'id']);
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['id' => 'id_producto'])->viaTable('guarniciones_r_productos', ['id_guarnicion' => 'id']);
    }
}
