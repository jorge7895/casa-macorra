<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categorias".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Platos[] $platos
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required','message'=>'Ingresa una categoría'],
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
        ];
    }

    /**
     * Gets query for [[Platos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatos()
    {
        return $this->hasMany(Platos::className(), ['categoria' => 'id']);
    }
    
    public function getNombre(){
        return "nombre";
    }
    
    public function getCategoria(){
        return $this->nombre;
    }
}
