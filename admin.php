<?php
include_once './PHP/sql.php';
include('cabecera_home.php');
$sql_objeto = new sql();
$sql_objeto->conexion_pdo();
$resultado = $sql_objeto->consultar_usuarios_por_categoria(1) ;

$errores = ''; 
if($_POST){
			$sql_objeto->conexion_mysqli();
                     
            
			$email = $_POST['email'];
			$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
            $contraseña2 = $_POST['contraseña2'];

			
			
            if(password_verify($contraseña2,$contraseña) and !empty($contraseña)){
              
              if (!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errores .= '<div class="alert alert-danger" role="alert">El email no es valido</div>';

              }else{
                $sql = "select * from usuario where email = ? ";
                $result= $sql_objeto->consulta_individual_mysqli_email($sql);
                $columnas = $result->num_rows;
                echo $columnas;
                if($columnas > 0) {
                  $errores .= '<div class="alert alert-danger py-3" role="alert">El email ya esta registrado</div>.';
                }else {
                  $sql = "insert into usuario(nombre,apellido,email,contraseña,telefono,id_jerarquia) values (?,?,?,?,?,1)";
                  $sql_objeto->insertar_usuario_mysqli($sql);
				  header("location: admin.php?email=". $email);
				  echo $sql;	
                }


              }                      
            }else{
                $errores .= '<div class="alert alert-danger py-3" role="alert">Las contraseñas no coinciden</div>';

			}
			
}
?>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuarios <small>Administradores</small></h1>
			</div>
			<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>
            <?php
             	echo $errores;
            ?>

			
			<?php

				
					if(isset($_GET['email'])){
						echo '<div class="alert alert-success" role="alert">Se registro correctamente '.$_GET['email'] .'</div>';
					}
				
			?>

		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px; background-color: black">
					  	<li ><a href="#new" data-toggle="tab">Nuevo</a></li>
					  	<li><a class="active" href="#list" data-toggle="tab">Lista</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
									    <form Method="POST">
									    	<div class="form-group label-floating">
											  <label class="control-label">Nombre</label>
											  <input class="form-control" name= 'name' type="text">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Apellido</label>
											  <input class="form-control"  name= 'apellido'  type="text">
											</div>
								
											<div class="form-group label-floating">
											  <label class="control-label">Email</label>
											  <input class="form-control"  name= 'email'  type="text">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Telefono</label>
											  <input class="form-control" name= 'phone'  type="text">
											</div>

											<div class="form-group label-floating">
											  <label class="control-label">Contraseña</label>
											  <input name="contraseña" type="password" class="form-control" required>
											</div>

											<div class="form-group label-floating">
											  <label class="control-label">Repetir Contraseña</label>
											  <input name="contraseña2" type="password" class="form-control" required>
											</div>

										    <p class="text-center">
										    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
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
											<th class="text-center">Apellido</th>
											
											<th class="text-center">Email</th>
											<th class="text-center">Telefono</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($resultado as $admin):?>
										<tr>
											<td><?php echo $admin['id_usuario'];?></td>
											<td><?php echo $admin['nombre'];?></td>
											<td><?php echo $admin['apellido'];?></td>
											
											<td><?php echo $admin['email'];?></td>
											<td><?php echo $admin['telefono'];?></td>
											<td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
										</tr>
										<?php endforeach;?>
									</tbody>
								</table>
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

	<!-- Dialog help -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Dialog-Help">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    	<h4 class="modal-title">Help</h4>
			    </div>
			    <div class="modal-body">
			        <p>
			        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt beatae esse velit ipsa sunt incidunt aut voluptas, nihil reiciendis maiores eaque hic vitae saepe voluptatibus. Ratione veritatis a unde autem!
			        </p>
			    </div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
		      	</div>
		    </div>
	  	</div>
	</div>
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