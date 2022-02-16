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
        return $this->hasMany(ProductosEnGuarniciones::className(), ['id_guarnicion' => 'id']);
    }
}
