<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\Productos;
/**
 * This is the model class for table "platos".
 *
 * @property int $id
 * @property string $nombre
 * @property int|null $categoria
 * @property float|null $precio_publico
 * @property float|null $coste
 *
 * @property Categorias $categoria0
 * @property Comandas[] $comandas
 * @property GuarnicionesEnPlatos[] $guarnicionesEnPlatos
 * @property ProductosEnPlatos[] $productosEnPlatos
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
            [['nombre'], 'string', 'max' => 200],
            [['nombre'], 'match','pattern'=>'/^[a-z,.\s-]+$/i'],
            [['precio_publico', 'coste'], 'number','min' => 0],            
            [['categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['categoria' => 'id']],
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
            'categoria' => 'Categoría',
            'precio_publico' => 'Precio de venta',
            'coste' => 'Coste de fabricación',
        ];
    }
    
    /**
     * Gets query for [[Categoria0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria0()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'categoria']);
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
     * Gets query for [[GuarnicionesEnPlatos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuarnicionesEnPlatos()
    {
        return $this->hasMany(GuarnicionesEnPlatos::className(), ['id_plato' => 'id']);
    }

    /**
     * Gets query for [[ProductosEnPlatos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosEnPlatos()
    {
        return $this->hasMany(ProductosEnPlatos::className(), ['id_plato' => 'id'])
                ->orderBy('id_producto ASC');
    }
    
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['id' => 'id_producto'])
                ->viaTable('productos_en_platos', ['id_plato'=>'id'])
                ->orderBy('id ASC');
    }
    

    public function getdropdownCategoria(){
        $models = Categorias::find()->asArray()->all();
        
        return ArrayHelper::map($models, 'id', 'nombre');
    }

}
