<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "platos_r_guarniciones".
 *
 * @property int $id
 * @property int|null $id_plato
 * @property int|null $id_guarnicion
 *
 * @property Guarniciones $guarnicion
 * @property Platos $plato
 */
class PlatosRGuarniciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'platos_r_guarniciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_plato', 'id_guarnicion'], 'integer'],
            [['id_plato', 'id_guarnicion'], 'unique', 'targetAttribute' => ['id_plato', 'id_guarnicion']],
            [['id_guarnicion'], 'exist', 'skipOnError' => true, 'targetClass' => Guarniciones::className(), 'targetAttribute' => ['id_guarnicion' => 'id']],
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
            'id_guarnicion' => 'Id Guarnicion',
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
     * Gets query for [[Plato]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlato()
    {
        return $this->hasOne(Platos::className(), ['id' => 'id_plato']);
    }
}
