<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ArticuloSucursal */

$this->title = $model->sku;
$this->params['breadcrumbs'][] = ['label' => 'Articulo Sucursals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulo-sucursal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'sku' => $model->sku, 'id_sucursales' => $model->id_sucursales], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'sku' => $model->sku, 'id_sucursales' => $model->id_sucursales], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [   
            [
                'attribute' => 'sku',
                'value' => Html::a($model->sku,['articulos/view','id' => $model->sku]),
                'format' => 'html',
            ],
            
            'id_sucursales',
            'costo',
            'precio_venta',
            'created_at',
            'updated_at',
            'precio_sugerido',
        ],
    ]) ?>
    
    	
    <pre><?php print_r($modelArticulos->getAttributes()) ?> </pre>
     <?= DetailView::widget([
        'model' => $modelArticulos,
        'attributes' => [
            'sku',
            'descripcion',
            'iva',
        ],
    ]) ?>
    

</div>
