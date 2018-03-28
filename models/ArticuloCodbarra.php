<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articulo_codbarra".
 *
 * @property int $sku
 * @property string $codigo_barra
 * @property string $created_by
 * @property string $updated_by
 *
 * @property Articulos $sku0
 */
class ArticuloCodbarra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articulo_codbarra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku', 'codigo_barra'], 'required'],
            [['sku'], 'integer'],
            [['created_by', 'updated_by'], 'safe'],
            [['codigo_barra'], 'string', 'max' => 13],
            [['sku', 'codigo_barra'], 'unique', 'targetAttribute' => ['sku', 'codigo_barra']],
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
            'codigo_barra' => 'Codigo Barra',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSku0()
    {
        return $this->hasOne(Articulos::className(), ['sku' => 'sku']);
    }
}
