<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comandas".
 *
 * @property int $id
 * @property string|null $fecha
 * @property float|null $precio_total
 * @property int|null $id_plato
 * @property int|null $cantidad
 *
 * @property Platos $plato
 */
class Comandas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comandas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_plato', 'cantidad'], 'integer'],
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
            'fecha' => 'Fecha',
            'precio_total' => 'Precio Total',
            'id_plato' => 'Id Plato',
            'cantidad' => 'Cantidad',
        ];
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
    
    public function getdropdownPlato(){
        $models = Platos::find()->asArray()->all();
        
        return \yii\helpers\ArrayHelper::map($models, 'id', 'nombre');
    }
    
}
