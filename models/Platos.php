<?php

namespace app\models;

use Yii;

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
            [['categoria'], 'integer'],
            [['precio_publico', 'coste'], 'number'],
            [['nombre'], 'string', 'max' => 200],
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
            'categoria' => 'Categoria',
            'precio_publico' => 'Precio Publico',
            'coste' => 'Coste',
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
        return $this->hasMany(ProductosEnPlatos::className(), ['id_plato' => 'id']);
    }
    
    public function getdropdownCategoria(){
        $models = Categorias::find()->asArray()->all();
        
        return \yii\helpers\ArrayHelper::map($models, 'id', 'nombre');
    }
}
