<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArticuloSucursal */

$this->title = 'Create Articulo Sucursal';
$this->params['breadcrumbs'][] = ['label' => 'Articulo Sucursals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulo-sucursal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
