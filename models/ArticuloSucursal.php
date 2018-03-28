<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articulo_sucursal".
 *
 * @property int $sku
 * @property int $id_sucursales
 * @property double $costo
 * @property double $precio_venta
 * @property string $created_at
 * @property string $updated_at
 * @property double $precio_sugerido
 *
 * @property Articulos $sku0
 * @property Sucursales $sucursales
 */
class ArticuloSucursal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articulo_sucursal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku', 'id_sucursales'], 'required'],
            [['sku', 'id_sucursales'], 'integer'],
            [['costo', 'precio_venta', 'precio_sugerido'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['sku', 'id_sucursales'], 'unique', 'targetAttribute' => ['sku', 'id_sucursales']],
            [['sku'], 'exist', 'skipOnError' => true, 'targetClass' => Articulos::className(), 'targetAttribute' => ['sku' => 'sku']],
            [['id_sucursales'], 'exist', 'skipOnError' => true, 'targetClass' => Sucursales::className(), 'targetAttribute' => ['id_sucursales' => 'id_sucursal']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sku' => 'Sku',
            'id_sucursales' => 'Id Sucursales',
            'costo' => 'Costo',
            'precio_venta' => 'Precio Venta',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'precio_sugerido' => 'Precio Sugerido',
        ];
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
    public function getSucursales()
    {
        return $this->hasOne(Sucursales::className(), ['id_sucursal' => 'id_sucursales']);
    }
}
