<?php 
include_once './PHP/sql.php';
include('cabecera_home.php');
$sql_objeto = new sql();
$sql_objeto->conexion_pdo();
$resultado_consulta = $sql_objeto->consultar_usuarios_por_categoria(2) ;

//variables para paginacion
$numero_clientes_paginacion = 2;
$num_clientes = $sql_objeto->contar_clientes();
$paginas = $num_clientes/$numero_clientes_paginacion;
$paginas = ceil($paginas);

?>

		<!-- Content page -->
		<?php
		if($paginas >0){ 
			if(!$_GET['pagina']){
				header('Location:admin_clientes.php?pagina=1');
			}
			if($_GET['pagina'] > $paginas || $_GET['pagina'] <1){
				header('Location:admin_clientes.php?pagina=1');
			}

			$iniciar = ($_GET['pagina']-1)*$numero_clientes_paginacion;
			$resultado_consulta = $sql_objeto-> consultar_clientes_paginacion($iniciar, $numero_clientes_paginacion);
		}


		?>
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-face"></i> Clientes</small></h1>
			</div>
		</div>

		<?php if(isset($_GET['correctamente'])): ?>

		<?php if($_GET['correctamente'] == 1): ?>

			<div class="alert alert-success" role="alert">
			 Se ha Eliminado correctamente al usuario
			</div>
		<?php else: ?>
			<div class="alert alert-danger" role="alert">
			Ha ocurrido un error
			</div>
		<? endif;?>
		<? endif ?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px; background-color: black">
						<li class="active"><a href="#list" data-toggle="tab">Lista</a></li>
					  	
					</ul>
					<div id="myTabContent" class="tab-content">
						
					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Apellido</th>
											<th class="text-center">Telefono</th>
											<th class="text-center">E-mail</th>
											<th class="text-center">Eliminar</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($resultado_consulta as $usuario): ?>    
										<tr>
											<td><?php echo $usuario['id_usuario']; ?></td>
											<td><?php echo $usuario['nombre'] ;?></td>
											<td><?php echo $usuario['apellido']; ?></td>
											<td><?php echo $usuario['telefono'] ;?></td>
											<td><?php echo $usuario['email'] ;?></td>
											

											<td><a href="eliminar_usuario.php?id=<?php echo $usuario['id_usuario']; ?>" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
										</tr>
										<?php endforeach; ?>
									
									</tbody>
								</table>
								<ul class="pagination pagination-sm">
								  	<li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
									  <a class="page-link"href="admin_clientes.php?pagina=<?php echo $_GET['pagina']-1 ?>"
									  >«
									  </a>
									</li>

									<?php for($i=0; $i<$paginas; $i++): ?>
								  	<li class="page-item <?php echo $_GET['pagina'] == $i+1 ? 'active' : '' ?>">
									  <a class="page-link" href="admin_clientes.php?pagina=<?php echo $i+1 ?>">
										  <?php echo $i+1; ?>
									  </a>
									</li>
									<?php endfor ?>
								  	
								  	<li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled' : '' ?>">
									  <a class="page-link" href="admin_clientes.php?pagina=<?php echo $_GET['pagina']+1 ?>">
									  »
									  </a>
									</li>
								</ul>
							</div>
					  	</div>
					</div>
				</div>
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

