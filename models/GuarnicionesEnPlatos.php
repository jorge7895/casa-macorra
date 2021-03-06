<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guarniciones_en_platos".
 *
 * @property int $id
 * @property int|null $id_plato
 * @property int|null $id_guarnicion
 *
 * @property Guarniciones $guarnicion
 * @property Platos $plato
 */
class GuarnicionesEnPlatos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guarniciones_en_platos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_plato', 'id_guarnicion'], 'integer'],
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
            'id_plato' => 'Plato',
            'id_guarnicion' => 'Guarnicion',
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
