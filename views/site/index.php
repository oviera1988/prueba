<?php

/* @var $this yii\web\View */
use kartik\icons\Icon;
use yii\helpers\Html;


$this->title = 'Reservas SUM';
?>
<div class="site-index">

	<div class="jumbotron">
		<h1>SUM Nostrum Parque</h1>

		<p class="lead">Realice su reserva en tres simples pasos</p>

		<p>
		
<?= Html::a('Calendario', ['/events/index'], ['class'=>'btn btn-success']) ?>
		</p>
	</div>

	<div class="body-content">


		<div class="row">
			<div class="col-lg-4">
				<h2>Paso 1  <?= Icon::show('calendar', [], Icon::BSG) ?></h2>
				<p>
					Inicie sesion en la aplicacion con su usuario e ingrese al calendario
					
				</p>


			</div>
			<div class="col-lg-4">
				<h2>Paso 2  <?= Icon::show('floppy-saved', [], Icon::BSG) ?></h2>

				<p>
					Seleccione el dia que desea realizar la reserva y confirme 		
					 
				</p>


			</div>
			<div class="col-lg-4">
				<h2>Paso 3  <?= Icon::show('cutlery', [], Icon::BSG) ?></h2>
				<p>
					Pronto!! Disfrute de las instalaciones del Salon de Usos Multiples
					
				</p>


			</div>
		</div>

	</div>
</div>
