<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArticuloSucursal;

/**
 * ArticuloSucursalSearch represents the model behind the search form of `app\models\ArticuloSucursal`.
 */
class ArticuloSucursalSearch extends ArticuloSucursal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku', 'id_sucursales'], 'integer'],
            [['costo', 'precio_venta', 'precio_sugerido'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = ArticuloSucursal::find();

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
            'id_sucursales' => $this->id_sucursales,
            'costo' => $this->costo,
            'precio_venta' => $this->precio_venta,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'precio_sugerido' => $this->precio_sugerido,
        ]);

        return $dataProvider;
    }
}
