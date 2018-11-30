<?php  
include("../../seguridad.php");
?>

<?php

require_once 'entidad/Producto.Entidad.php';
require_once 'model/Producto.Model.php';
require_once 'entidad/Insumo.Entidad.php';
require_once 'model/Insumo.Model.php';

// Logica de negocio
$alm = new Producto();
$model = new ProductoModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idProducto',                               $_REQUEST['idProducto']);
			$alm->__SET('Nombre_producto',                          $_REQUEST['Nombre_producto']);
			$alm->__SET('Precio_producto',                          $_REQUEST['Precio_producto']);
			$alm->__SET('fk_idInsumo',                          	$_REQUEST['fk_idInsumo']);
			
 
			$model->Actualizar($alm);
			header('Location: edit_product.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idProducto']);
			header('Location: edit_product.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idProducto']);
			break;
	}
}

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
                <h1 class="page-header">Editar informacion</h1>
            </div>
                <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="?action=<?php echo $alm->idProducto > 0 ? 'actualizar' : 'registrar'; ?>" method="POST">
                                    	<input type="hidden" name="idProducto" value="<?php echo $alm->__GET('idProducto'); ?>" />
                                        <div class="form-group">
                                            <label>Nombre del producto</label>
                                            <input class="form-control" name="Nombre_producto" required="" autocomplete="off" value="<?php echo $alm->__GET('Nombre_producto'); ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label>Precio del producto</label>
                                            <input class="form-control" name="Precio_producto" required="" autocomplete="off" value="<?php echo $alm->__GET('Precio_producto'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Insumo correspondiente</label>
                                            <select class="form-control" name="fk_idInsumo">
                                            	<option value="0">--Seleccione--</option>
			                                    <?php
			                                        $tinsum = new InsumoModel();
			                                        foreach($tinsum->Listar() as $tins):
			                                    ?>
			                                    <option value="<?php echo $tins->__GET('idInsumo') ?>"
			                                    <?php echo $tins->__GET('idInsumo') == $alm->__GET('idInsumo') ? 'selected' : ''?>>
			                                    <?php echo $tins->__GET('Nombre_insumo') ?></option>
			                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Editar</button>
                                        <button type="reset" class="btn btn-primary btn-lg">Limpiar informacion</button>
                                    </form>
                                    <br>

						    		<div class="row">
							                <div class="col-lg-12">
							                    <div class="panel panel-default">
							                        <!-- /.panel-heading -->
							                        <div class="panel-body">
							                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							                            	<thead>
							                                    <tr>
							                                        <th>Nombre del producto</th>
							                                        <th>Precio del producto</th>
							                                        <th>Insumo correspondiente</th>
							                                    </tr>
							                                </thead>
							                                <tbody>
							                                <?php foreach($model->Listar() as $r): ?>
                                                                <tr>
                                                                    <td><?php echo $r->__GET('Nombre_producto'); ?></td>
                                                                    <td><?php echo $r->__GET('Precio_producto'); ?></td>
                                                                    <td><?php echo $r->__GET('fk_idInsumo'); ?></td>
                                                                    
                                                                    <td>
                                                                        <a href="?action=editar&idProducto=<?php echo $r->idProducto; ?>">Editar</a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
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
                                </div>                          
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    	</div>

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

</body>
</html>