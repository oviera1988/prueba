<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Secciones;

/* @var $this yii\web\View */
/* @var $model app\models\Articulos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulos-form"> 

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sku')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'iva')->textInput() ?>

    <?= $form->field($model, 'estado')->dropDownList(['0' => '0', '1' => '1']  ) ?>
	
	<?php $secciones = ArrayHelper::map(Secciones::find()->all(), 'id_seccion','id_seccion'); ?>
	
    <?= $form->field($model, 'id_seccion')->dropDownList($secciones,['prompt'=>'Seleccione']) ?>

    <!-- <?= $form->field($model, 'id_seccion')->textInput() ?> -->

    <?= $form->field($model, 'cpp')->textInput() ?>

    <?= $form->field($model, 'id_categoria')->textInput() ?>

    <?= $form->field($model, 'precio_lista')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
