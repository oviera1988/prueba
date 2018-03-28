<?php

namespace app\models;

use Yii;
use phpDocumentor\Reflection\Types\This;

/**
 * This is the model class for table "articulos".
 *
 * @property int $sku
 * @property string $descripcion
 * @property double $iva
 * @property string $estado
 * @property int $id_seccion
 * @property double $cpp
 * @property int $id_categoria
 * @property double $precio_lista
 *
 * @property ArticuloCodbarra[] $articuloCodbarras
 * @property ArticuloProveedor[] $articuloProveedors
 * @property Proveedores[] $ruts
 * @property ArticuloSucursal[] $articuloSucursals
 * @property Sucursales[] $sucursales
 * @property Categorias $categoria
 * @property Secciones $seccion
 * @property PrecioCompetidor[] $precioCompetidors
 */
class Articulos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articulos';
    }

    /**
     * @inheritdoc
     */
    
    
    public function rules()
    {
        return [
            [['sku', 'descripcion'], 'required'],
            [['sku', 'id_seccion', 'id_categoria'], 'integer'],
            [['descripcion'], 'string'],
            [['iva', 'cpp', 'precio_lista'], 'number'],
            [['estado'], 'string', 'max' => 1],
            [['sku'], 'unique'],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['id_categoria' => 'id_categoria']],
            [['id_seccion'], 'exist', 'skipOnError' => true, 'targetClass' => Secciones::className(), 'targetAttribute' => ['id_seccion' => 'id_seccion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sku' => 'Sku',
            'descripcion' => 'Descripcion',
            'iva' => 'Iva',
            'estado' => 'Estado',
            'id_seccion' => 'Seccion',
            'cpp' => 'Cpp',
            'id_categoria' => 'Categoria',
            'precio_lista' => 'Precio Lista',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloCodbarras()
    {
        return $this->hasMany(ArticuloCodbarra::className(), ['sku' => 'sku']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloProveedors()
    {
        return $this->hasMany(ArticuloProveedor::className(), ['sku' => 'sku']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuts()
    {
        return $this->hasMany(Proveedores::className(), ['rut' => 'rut'])->viaTable('articulo_proveedor', ['sku' => 'sku']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloSucursals()
    {
        return $this->hasMany(ArticuloSucursal::className(), ['sku' => 'sku']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursales()
    {
        return $this->hasMany(Sucursales::className(), ['id_sucursal' => 'id_sucursales'])->viaTable('articulo_sucursal', ['sku' => 'sku']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['id_categoria' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeccion()
    {
        return $this->hasOne(Secciones::className(), ['id_seccion' => 'id_seccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrecioCompetidors()
    {
        return $this->hasMany(PrecioCompetidor::className(), ['sku' => 'sku']);
    }
}
