<?php
    Include("../../seguridad.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inicio</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <p class="navbar-brand">Nombre Empleado: <?php echo $_SESSION["Nombre_usuario"],' '; echo $_SESSION["Apellido_usuario"]; ?> 
            </p>

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil de usuario</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../../salir.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i>Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gears fa-fw"></i>Crear<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Empleado<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="create_user.php">► Crear nuevo empleado</a>
                                        </li>                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>                                
                                <li>
                                    <a href="#">Proveedor<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="create_provee.php">► Crear nuevo proveedor</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Categoria<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="create_catego.php">► Crear nueva categoria de insumos</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Insumo<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="create_insu.php">► Crear nuevo insumo</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Producto<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="create_plate.php">► Crear nuevo plato</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bookmark fa-fw"></i>Actualizar o editar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Empleados<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="edit_user.php">► Actualizar datos de empleados</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>                                
                                <li>
                                    <a href="#">Proveedores<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="edit_provee.php">► Actualizar datos de proveedor</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Categoria de insumos<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="edit_catego.php">► Editar categoria de insumos</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Insumos<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="edit_insu.php">► Actualizar datos de insumos</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Productos<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="edit_product.php">► Editar un producto</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>                           
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-alt fa-fw"></i>Listados<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="lista_usuarios.php">► Listado de empleados</a>
                                </li>
                                <li>
                                    <a href="lista_facturas.php">► Listado de facturas vendidas</a>
                                </li>
                                <li>
                                    <a href="lista_clientes.php">► Listado de clientes</a>
                                </li>
                                <li>
                                    <a href="lista_productos.php">► Listado de productos</a>
                                </li>
                                <li>
                                    <a href="lista_proveedores.php">► Listado de proveedores</a>
                                </li>
                                <li>
                                    <a href="lista_categorias.php">► Listado de categorias</a>
                                </li>
                                <li>
                                    <a href="lista_insumos.php">► Listado de insumos</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Listado de empleados</h1>
                </div>
                <!-- /.col-lg-12 -->
    		</div>

    		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            	<thead>
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <!--<th>Genero</th>
                                    	<th>Tipo de documento</th>-->
                                        <th>Numero documento</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Correo electronico</th>
                                        <th>Contraseña</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
									class Usuarios_lista
								    {
								        public function listar_usua()
								        {
								            //SESSION_START();

								            $cont='0';

								            include('../../conexion_db.php');

								            $sql = "SELECT * FROM `usuario`";
								        
								            if (!$result = $db->query($sql))
								            {
								                die('Datos no encontrados!!! [' . $db->error . ']');
								            }

								            while($row = $result->fetch_assoc())
								        {
								            $nnombre_emple=stripslashes($row["Nombre_usuario"]);
								            $aapellido_emple=stripslashes($row["Apellido_usuario"]);
								            //$ffk_idGenero=stripslashes($row["fk_idGenero"]);
								            //$ffk_idTipo_documento=stripslashes($row["fk_idTipo_documento"]);
								            $nnumero_documento=stripslashes($row["Numero_documento"]);
								            $ttelefono_usuario=stripslashes($row["Telefono_usuario"]);
								            $ddireccion_usuario=stripslashes($row["Direccion_usuario"]);
								            $ccorreo_usuario=stripslashes($row["Correo_usuario"]);
								            $ccontrasena_ingreso=stripslashes($row["Contrasena_ingreso"]);
								            $ffk_idRol=stripslashes($row["fk_idRol"]);
								            $ffk_idEstado=stripslashes($row["fk_idEstado"]);

								            
								            echo "<tr class='odd gradeX'>";

								            echo "<td>$nnombre_emple</td>";
								            echo "<td>$aapellido_emple</td>";
								            //echo "<td>$ffk_idGenero</td>";
								            //echo "<td>$ffk_idTipo_documento</td>";
								            echo "<td>$nnumero_documento</td>";
								            echo "<td>$ttelefono_usuario</td>";
								            echo "<td>$ddireccion_usuario</td>";
								            echo "<td>$ccorreo_usuario</td>";
								            echo "<td>$ccontrasena_ingreso</td>";
								            echo "<td>$ffk_idRol</td>";
								            echo "<td>$ffk_idEstado</td>";

								            echo "</tr>";
								            
								   		}
								    }
								}
								$nuevo=new Usuarios_lista();
								$nuevo->listar_usua();
								?>
								</tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	

	<!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>
</html>
