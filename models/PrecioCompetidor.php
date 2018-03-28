<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "precio_competidor".
 *
 * @property int $id_sucursal
 * @property int $id_competidor
 * @property int $sku
 * @property double $precio_competidor
 * @property int $oferta
 * @property string $created_at
 * @property string $updated_at
 * @property string $observaciones
 * @property double $precio_automatizado
 * @property int $oferta_automatizada
 * @property int $id_alerta
 * @property string $actualizacion_local
 *
 * @property Alertas $alerta
 * @property Articulos $sku0
 * @property Competidores $competidor
 * @property Sucursales $sucursal
 */
class PrecioCompetidor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'precio_competidor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sucursal', 'id_competidor', 'sku', 'precio_competidor'], 'required'],
            [['id_sucursal', 'id_competidor', 'sku', 'id_alerta'], 'integer'],
            [['precio_competidor', 'precio_automatizado'], 'number'],
            [['created_at', 'updated_at', 'actualizacion_local'], 'safe'],
            [['oferta', 'oferta_automatizada'], 'string', 'max' => 4],
            [['observaciones'], 'string', 'max' => 255],
            [['id_competidor', 'id_sucursal', 'sku'], 'unique', 'targetAttribute' => ['id_competidor', 'id_sucursal', 'sku']],
            [['id_sucursal', 'id_competidor', 'sku'], 'unique', 'targetAttribute' => ['id_sucursal', 'id_competidor', 'sku']],
            [['id_alerta'], 'exist', 'skipOnError' => true, 'targetClass' => Alertas::className(), 'targetAttribute' => ['id_alerta' => 'id_alerta']],
            [['sku'], 'exist', 'skipOnError' => true, 'targetClass' => Articulos::className(), 'targetAttribute' => ['sku' => 'sku']],
            [['id_competidor'], 'exist', 'skipOnError' => true, 'targetClass' => Competidores::className(), 'targetAttribute' => ['id_competidor' => 'id_competidor']],
            [['id_sucursal'], 'exist', 'skipOnError' => true, 'targetClass' => Sucursales::className(), 'targetAttribute' => ['id_sucursal' => 'id_sucursal']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sucursal' => 'Id Sucursal',
            'id_competidor' => 'Id Competidor',
            'sku' => 'Sku',
            'precio_competidor' => 'Precio Competidor',
            'oferta' => 'Oferta',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'observaciones' => 'Observaciones',
            'precio_automatizado' => 'Precio Automatizado',
            'oferta_automatizada' => 'Oferta Automatizada',
            'id_alerta' => 'Id Alerta',
            'actualizacion_local' => 'Actualizacion Local',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlerta()
    {
        return $this->hasOne(Alertas::className(), ['id_alerta' => 'id_alerta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSku0()
    {
        return $this->hasOne(Articulos::className(), ['sku' => 'sku']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetidor()
    {
        return $this->hasOne(Competidores::className(), ['id_competidor' => 'id_competidor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursal()
    {
        return $this->hasOne(Sucursales::className(), ['id_sucursal' => 'id_sucursal']);
    }
}
