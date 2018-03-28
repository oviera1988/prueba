<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresas".
 *
 * @property int $id_empresa
 * @property string $razon_social
 * @property string $telefono
 *
 * @property Competidores[] $competidores
 */
class Empresas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['razon_social'], 'required'],
            [['razon_social'], 'string', 'max' => 60],
            [['telefono'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empresa' => 'Id Empresa',
            'razon_social' => 'Razon Social',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetidores()
    {
        return $this->hasMany(Competidores::className(), ['id_empresa' => 'id_empresa']);
    }
}
