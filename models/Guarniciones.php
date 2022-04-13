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
 * @property GuarnicionesEnPlatos[] $guarnicionesEnPlatos
 * @property ProductosEnGuarniciones[] $productosEnGuarniciones
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
            [['nombre'], 'string', 'max' => 200],
            [['nombre'],'match','pattern'=>'/^[a-z,.\s-]+$/i'],
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
     * Gets query for [[GuarnicionesEnPlatos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuarnicionesEnPlatos()
    {
        return $this->hasMany(GuarnicionesEnPlatos::className(), ['id_guarnicion' => 'id']);
    }

    /**
     * Gets query for [[ProductosEnGuarniciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosEnGuarniciones()
    {
        return $this->hasMany(ProductosEnGuarniciones::className(), ['id_guarnicion' => 'id'])
                ->orderBy('id ASC');
    }
    
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['id' => 'id_producto'])
                ->viaTable('productos_en_guarniciones', ['id_guarnicion'=>'id'])
                ->orderBy('id ASC');
    }
}
