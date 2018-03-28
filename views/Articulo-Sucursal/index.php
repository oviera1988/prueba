<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticuloSucursalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articulo Sucursals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulo-sucursal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Articulo Sucursal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sku',
            'id_sucursales',
            'costo',
            'precio_venta',
            'created_at',
            //'updated_at',
            //'precio_sugerido',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
