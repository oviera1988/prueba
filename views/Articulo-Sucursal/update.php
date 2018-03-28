<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArticuloSucursal */

$this->title = 'Update Articulo Sucursal: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Articulo Sucursals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sku, 'url' => ['view', 'sku' => $model->sku, 'id_sucursales' => $model->id_sucursales]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="articulo-sucursal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
