<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alertas".
 *
 * @property int $id_alerta
 * @property string $descripcion
 * @property int $prioridad
 * @property string $formula
 *
 * @property PrecioCompetidor[] $precioCompetidors
 */
class Alertas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alertas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_alerta', 'descripcion', 'prioridad'], 'required'],
            [['id_alerta', 'prioridad'], 'integer'],
            [['descripcion', 'formula'], 'string', 'max' => 255],
            [['id_alerta'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_alerta' => 'Id Alerta',
            'descripcion' => 'Descripcion',
            'prioridad' => 'Prioridad',
            'formula' => 'Formula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrecioCompetidors()
    {
        return $this->hasMany(PrecioCompetidor::className(), ['id_alerta' => 'id_alerta']);
    }
}
