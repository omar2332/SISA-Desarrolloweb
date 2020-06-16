<?php 

/*
if(!isset($_GET['id'])){
    header('location: home.php');
}
*/
include('cabecera_home.php');
include_once './PHP/sql.php';
$sql_objeto = new sql();
$sql_objeto->conexion_pdo();

$resultado = $sql_objeto->mostrar_cotizacion_por_id($_GET['id']);


?>

	<!-- Content page -->
	<div class="container-fluid">
		<div class="container-fluid">
			<div class="page-header text-center">
			  <h2 class="text-titles">Cotizacion # <?php echo $_GET['id']; ?></h2>
			</div>
		</div>
		
		<?php foreach($resultado as $cotizacion): ?>
        <div class="container-fluid">
			<h3 class="text-titles">Asunto: <?php echo $cotizacion['asunto']  ;?></h3><br>

            <h4>Cliente: <?php echo $cotizacion['nombre'].' '.$cotizacion['apellido']  ;?></h4>
			<h4>Email: <?php echo $cotizacion['email']  ;?></h4>
			<h4>Telefono: <?php echo $cotizacion['telefono']  ;?></h4> <br>
			
			<h4 class="text-titles text-primary">Mensaje:</h4><br><br>

			<div class="bg-info mensaje">
				
				<p><?php echo $cotizacion['texto']  ;?></p>
			</div>
			
        </div>
        <?php endforeach; ?>
		
		<br><br>
		<div class='text-center'>
			<a href='lista_cotizaciones.php' class="text btn btn-success">Regresar</a>
		</div>
		
	</div>

		
	</section>

	<!-- Notifications area -->
	<section class="full-box Notifications-area">
		<div class="full-box Notifications-bg btn-Notifications-area"></div>
		<div class="full-box Notifications-body">
			<div class="Notifications-body-title text-titles text-center">
				Notifications <i class="zmdi zmdi-close btn-Notifications-area"></i>
			</div>
			<div class="list-group">
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-triangle"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">17m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-octagon"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">15m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
				<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-help"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">10m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
				</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-info"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">8m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
			  	</div>
			</div>

		</div>
	</section>



	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>