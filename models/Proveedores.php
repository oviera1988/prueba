<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedores".
 *
 * @property int $rut
 * @property string $razon_social
 * @property string $folio
 * @property string $direccion
 * @property string $telefono
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ArticuloProveedor[] $articuloProveedors
 * @property Articulos[] $skus
 */
class Proveedores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proveedores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rut', 'razon_social'], 'required'],
            [['rut'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['razon_social', 'direccion'], 'string', 'max' => 60],
            [['folio'], 'string', 'max' => 255],
            [['telefono'], 'string', 'max' => 20],
            [['rut'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rut' => 'Rut',
            'razon_social' => 'Razon Social',
            'folio' => 'Folio',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloProveedors()
    {
        return $this->hasMany(ArticuloProveedor::className(), ['rut' => 'rut']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkus()
    {
        return $this->hasMany(Articulos::className(), ['sku' => 'sku'])->viaTable('articulo_proveedor', ['rut' => 'rut']);
    }
}
