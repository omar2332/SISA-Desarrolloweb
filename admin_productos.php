<?php 
include_once './PHP/sql.php';
include_once './PHP/producto.php';
include('cabecera_home.php');
$sql_objeto = new sql();
$producto_objeto = new producto();
?>

<?php 
$dir_subida = '.\imagenes\ ';
$error = '';
//$dirs = array();
$fichero_subido = '';
if($_POST){
	$sql_objeto->conexion_pdo();
	
	//echo $_POST['nombre'] ;
	//echo $_POST['clasificacion'] ;
	//echo $_POST['descripcion'] ;
	//echo $_POST['precio'] ;
	//datos del arhivo
	if(isset($_FILES['userfile']['name'])){
		
		$nombre_archivo = $_FILES['userfile']['name'];
		$tipo_archivo = $_FILES['userfile']['type'];
		$tamano_archivo = $_FILES['userfile']['size'];
		
		$id_categoria = $sql_objeto->buscar_id_categoria_producto_nombre($_POST['clasificacion']);
		$producto_objeto ->set_producto($id_categoria,$_POST['descripcion'],$_POST['nombre'],$_POST['precio'],$nombre_archivo);
		$producto_objeto ->insertar_producto();
		$id_producto = $sql_objeto->buscar_maximo_tabla('SELECT max(id_producto) as max_id FROM producto');
		$producto_objeto->set_id($id_producto);
		$producto_objeto->set_img();
		$fichero_subido = $dir_subida . basename($_FILES['userfile']['name']);

		//compruebo si las características del archivo son las que deseo
		if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 10000000000))) {
			echo '<div class="alert alert-warning" role="alert">La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table></div>';
		}else{
			if (move_uploaded_file($_FILES['userfile']['tmp_name'],  $fichero_subido)){
					echo '<div class="alert alert-success" role="alert">El producto ha sido cargado correctamente.</div>';
			}else{	
					echo ' <div class="alert alert-warning" role="alert"> Ocurrió algún error al subir el fichero. No pudo guardarse.</div>';
			}
		}
	}
}

?>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-dns zmdi-hc-fw"></i> Productos</small></h1>
			</div>
			<?php echo $tamano_archivo?>
			<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px; background-color: black">
						<li class="active"><a href="#list" data-toggle="tab">Lista</a></li>
					  	<li ><a href="#new" data-toggle="tab">Nuevo</a></li>
					  	
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
									    <form method="POST" enctype="multipart/form-data">
									    	<div class="form-group label-floating">
											  <label class="control-label">Nombre</label>
											  <input class="form-control" type="text" name='nombre'>
											</div>
											<div class="form-group">
											  <label class="control-label">Categoria</label>
											  
											  <?php
											  include_once 'conexion_pdo.php';
											  $sql_categorias = 'select * from clasificacion_productos';
											
											  $gsent= $pdo -> prepare($sql_categorias);
											  $gsent->execute();
											  $resultado = $gsent->fetchAll();

											  ?>
										        <select class="form-control" name = "clasificacion">
												<?php foreach($resultado as $categoria): ?>
										          <option><?php echo $categoria['nombre_clasificacion']?></option>
												  <?php endforeach?>
												  
										        </select>
										    </div>
											<div class="form-group">
											  <label class="control-label">Descripcion</label>
											  <textarea name="descripcion" class="form-control" rows="5">Escribe aqui la descripcion del producto</textarea>
											</div>
											
											<div class="form-group label-floating">
											  <label class="control-label">Precio</label>
											  <input class="form-control" type="text" name = "precio">
											</div>

											<div class="form-group">
												<button class="btn">
													<input type="hidden" name="MAX_FILE_SIZE" value="10000000000">
													<input name="userfile" type="file">
													Agregar imagen
												</button> 	
											
											</div>

										    <p class="text-center">
										    	<button type ="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Agregar</button>
										    </p>
									    </form>
									</div>
								</div>
							</div>
						</div>
					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Categoria</th>
											<th class="text-center">Descripcion</th>
											<th class="text-center">Precio</th>
											<th class="text-center">Actualizar</th>
											<th class="text-center">Eliminar</th>

										</tr>
									</thead>
									<tbody>
										<?php  
										$sql_categorias = 'SELECT * from producto,clasificacion_productos where producto.id_clasificacion = clasificacion_productos.id_clasificacion';
										$gsent= $pdo -> prepare($sql_categorias);
										$gsent->execute();
										$resultado = $gsent->fetchAll();
										?>
										        
										<?php foreach($resultado as $categoria): ?>        	  
										<tr>
											<td><?php echo $categoria['id_producto']?></td>
											<td><?php echo $categoria['nombre']?></td>
											<td><?php echo $categoria['nombre_clasificacion']?></td>
											<td><?php echo $categoria['descripcion']?></td>

											<td>$<?php echo number_format($categoria['precio'], 2, '.', ','); ?></td>

											<td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
											<td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
										</tr>
										<?php endforeach?>
									</tbody>
								</table>
								<ul class="pagination pagination-sm">
								  	<li class="disabled"><a href="#!">«</a></li>
								  	<li class="active"><a href="#!">1</a></li>
								  	<li><a href="#!">2</a></li>
								  	<li><a href="#!">3</a></li>
								  	<li><a href="#!">4</a></li>
								  	<li><a href="#!">5</a></li>
								  	<li><a href="#!">»</a></li>
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

<? $pdo = null ;?>