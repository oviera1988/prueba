<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competidores".
 *
 * @property int $id_competidor
 * @property int $id_empresa
 * @property string $direccion
 * @property string $telefono
 * @property string $created_at
 * @property string $updated_at
 * @property string $estado
 * @property string $nombre_fantasia
 *
 * @property Empresas $empresa
 * @property PrecioCompetidor[] $precioCompetidors
 * @property SucursalCompetidor[] $sucursalCompetidors
 * @property Sucursales[] $sucursals
 */
class Competidores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'competidores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa', 'direccion', 'nombre_fantasia'], 'required'],
            [['id_empresa'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['direccion', 'nombre_fantasia'], 'string', 'max' => 100],
            [['telefono'], 'string', 'max' => 60],
            [['estado'], 'string', 'max' => 1],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['id_empresa' => 'id_empresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_competidor' => 'Id Competidor',
            'id_empresa' => 'Id Empresa',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'estado' => 'Estado',
            'nombre_fantasia' => 'Nombre Fantasia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresas::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrecioCompetidors()
    {
        return $this->hasMany(PrecioCompetidor::className(), ['id_competidor' => 'id_competidor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursalCompetidors()
    {
        return $this->hasMany(SucursalCompetidor::className(), ['id_competidor' => 'id_competidor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursals()
    {
        return $this->hasMany(Sucursales::className(), ['id_sucursal' => 'id_sucursal'])->viaTable('sucursal_competidor', ['id_competidor' => 'id_competidor']);
    }
}
