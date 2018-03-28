<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articulo_proveedor".
 *
 * @property int $sku
 * @property int $rut
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Proveedores $rut0
 * @property Articulos $sku0
 */
class ArticuloProveedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articulo_proveedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku', 'rut'], 'required'],
            [['sku', 'rut'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['sku', 'rut'], 'unique', 'targetAttribute' => ['sku', 'rut']],
            [['rut'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedores::className(), 'targetAttribute' => ['rut' => 'rut']],
            [['sku'], 'exist', 'skipOnError' => true, 'targetClass' => Articulos::className(), 'targetAttribute' => ['sku' => 'sku']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sku' => 'Sku',
            'rut' => 'Rut',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRut0()
    {
        return $this->hasOne(Proveedores::className(), ['rut' => 'rut']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSku0()
    {
        return $this->hasOne(Articulos::className(), ['sku' => 'sku']);
    }
}
