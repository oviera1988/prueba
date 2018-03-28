<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sucursales".
 *
 * @property int $id_sucursal
 * @property string $descripcion
 * @property string $direccion
 * @property string $telefono
 * @property string $created_at
 * @property string $updated_at
 * @property int $estado
 * @property string $email
 *
 * @property ArticuloSucursal[] $articuloSucursals
 * @property Articulos[] $skus
 * @property PrecioCompetidor[] $precioCompetidors
 * @property SucursalCompetidor[] $sucursalCompetidors
 * @property Competidores[] $competidors
 * @property Users[] $users
 */
class Sucursales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sucursales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sucursal', 'descripcion', 'direccion'], 'required'],
            [['id_sucursal'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['descripcion'], 'string', 'max' => 30],
            [['direccion'], 'string', 'max' => 60],
            [['telefono'], 'string', 'max' => 20],
            [['estado'], 'string', 'max' => 4],
            [['email'], 'string', 'max' => 100],
            [['id_sucursal'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sucursal' => 'Id Sucursal',
            'descripcion' => 'Descripcion',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'estado' => 'Estado',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloSucursals()
    {
        return $this->hasMany(ArticuloSucursal::className(), ['id_sucursales' => 'id_sucursal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkus()
    {
        return $this->hasMany(Articulos::className(), ['sku' => 'sku'])->viaTable('articulo_sucursal', ['id_sucursales' => 'id_sucursal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrecioCompetidors()
    {
        return $this->hasMany(PrecioCompetidor::className(), ['id_sucursal' => 'id_sucursal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursalCompetidors()
    {
        return $this->hasMany(SucursalCompetidor::className(), ['id_sucursal' => 'id_sucursal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetidors()
    {
        return $this->hasMany(Competidores::className(), ['id_competidor' => 'id_competidor'])->viaTable('sucursal_competidor', ['id_sucursal' => 'id_sucursal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['id_sucursal' => 'id_sucursal']);
    }
}
