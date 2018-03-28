<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sucursal_competidor".
 *
 * @property int $id_sucursal
 * @property int $id_competidor
 * @property string $created_by
 * @property string $updated_by
 * @property int $referente_ajuste
 *
 * @property Competidores $competidor
 * @property Sucursales $sucursal
 */
class SucursalCompetidor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sucursal_competidor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sucursal', 'id_competidor'], 'required'],
            [['id_sucursal', 'id_competidor'], 'integer'],
            [['created_by', 'updated_by'], 'safe'],
            [['referente_ajuste'], 'string', 'max' => 1],
            [['id_sucursal', 'id_competidor'], 'unique', 'targetAttribute' => ['id_sucursal', 'id_competidor']],
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
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'referente_ajuste' => 'Referente Ajuste',
        ];
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
