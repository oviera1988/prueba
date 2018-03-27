<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "secciones".
 *
 * @property int $id_seccion
 * @property string $descripcion
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Articulos[] $articulos
 */
class Secciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'secciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_seccion', 'descripcion'], 'required'],
            [['id_seccion'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['descripcion'], 'string', 'max' => 50],
            [['id_seccion'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_seccion' => 'Id Seccion',
            'descripcion' => 'Descripcion',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulos()
    {
        return $this->hasMany(Articulos::className(), ['id_seccion' => 'id_seccion']);
    }
}
