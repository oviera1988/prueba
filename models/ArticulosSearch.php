<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Articulos;

/**
 * ArticulosSearch represents the model behind the search form of `app\models\Articulos`.
 */
class ArticulosSearch extends Articulos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku', 'id_seccion', 'id_categoria'], 'integer'],
            [['descripcion', 'estado'], 'safe'],
            [['iva', 'cpp', 'precio_lista'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Articulos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'sku' => $this->sku,
            'iva' => $this->iva,
            'id_seccion' => $this->id_seccion,
            'cpp' => $this->cpp,
            'id_categoria' => $this->id_categoria,
            'precio_lista' => $this->precio_lista,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
