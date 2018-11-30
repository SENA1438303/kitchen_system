<?php
    Include("../../seguridad.php");
?>

<?php

require_once 'entidad/Factura.Entidad.php';
require_once 'model/Factura.Model.php';
require_once 'entidad/Usuario.Entidad.php';
require_once 'model/Usuario.Model.php';
require_once 'entidad/Formapago.Entidad.php';
require_once 'model/Formapago.Model.php';
require_once 'entidad/Producto.Entidad.php';
require_once 'model/Producto.Model.php';

// Logica de negocio
$alm = new Factura();
$model = new FacturaModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'registrar':
            $alm->__SET('Nombres_cliente',                         $_REQUEST['Nombres_cliente']);
            $alm->__SET('Apellidos_cliente',                       $_REQUEST['Apellidos_cliente']);
            $alm->__SET('Cedula_cliente',                          $_REQUEST['Cedula_cliente']);
            $alm->__SET('Telefono_cliente',                        $_REQUEST['Telefono_cliente']);
            $alm->__SET('Fecha_impresion',                         $_REQUEST['Fecha_impresion']);
            $alm->__SET('Numero_mesa',                             $_REQUEST['Numero_mesa']);
            $alm->__SET('fk_idForma_pago',                         $_REQUEST['fk_idForma_pago']);
            $alm->__SET('fk_idUsuario',                            $_REQUEST['fk_idUsuario']);            
            $alm->__SET('fk_idProducto',                           $_REQUEST['fk_idProducto']);
            $alm->__SET('Total_factura',                           $_REQUEST['Total_factura']);


            $model->Registrar($alm);
            header('Location: factura_presen.php');
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
                <h1 class="page-header">Caja</h1>
            </div>
                <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="?action=<?php echo $alm->idFactura > 0 ? : 'registrar'; ?>" method="POST">
                                        <input type="hidden" name="idFactura" value="<?php echo $alm->__GET('idFactura'); ?>" />
                                        <div class="form-group col-lg-5">
                                            <label>Nombres del cliente</label>
                                            <input class="form-control" name="Nombres_cliente" placeholder="Nombres completos" required="" autocomplete="off" value="<?php echo $alm->__GET('Nombres_cliente'); ?>">
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <label>Apellidos del cliente</label>
                                            <input class="form-control" name="Apellidos_cliente" placeholder="Apellidos completos" required="" autocomplete="off" value="<?php echo $alm->__GET('Apellidos_cliente'); ?>">
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <label>Cedula del cliente</label>
                                            <input class="form-control" name="Cedula_cliente" placeholder="Sin espacios" required="" autocomplete="off" value="<?php echo $alm->__GET('Cedula_cliente'); ?>">
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <label>Telefono del cliente</label>
                                            <input class="form-control" name="Telefono_cliente" placeholder="Fijo / Celular" required="" autocomplete="off" value="<?php echo $alm->__GET('Telefono_cliente'); ?>">
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <label>Fecha de impresion</label>
                                            <input class="form-control" name="Fecha_impresion" required="" autocomplete="off" value="<?php echo $alm->__GET('Fecha_impresion'); ?>">
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <label>Numero de mesa</label>
                                            <input class="form-control" name="Numero_mesa" placeholder="N° mesa" required="" autocomplete="off" value="<?php echo $alm->__GET('Numero_mesa'); ?>">
                                        </div>
                                        <div class="form-group col-lg-10">
                                            <label>Forma de pago</label>
                                            <select class="form-control" name="fk_idForma_pago">
                                                <option value="0">--Seleccione--</option>
                                                <?php
                                                    $tfopag = new FormapagoModel();
                                                    foreach($tfopag->Listar() as $tfp):
                                                ?>
                                                <option value="<?php echo $tfp->__GET('idForma_pago') ?>"
                                                <?php echo $tfp->__GET('idForma_pago') == $alm->__GET('idForma_pago') ? 'selected' : ''?>>
                                                <?php echo $tfp->__GET('Descripcion_forma_pago');?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-10">
                                            <label>Persona quien vendio</label>
                                            <select class="form-control" name="fk_idUsuario">
                                                <option value="0">--Seleccione--</option>
                                                <?php
                                                    $tuser = new UsuarioModel();
                                                    foreach($tuser->Listar() as $tus):
                                                ?>
                                                <option value="<?php echo $tus->__GET('idUsuario') ?>"
                                                <?php echo $tus->__GET('idUsuario') == $alm->__GET('idUsuario') ? 'selected' : ''?>>
                                                <?php echo $tus->__GET('Nombre_usuario'); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div>
                                        <div class="form-group col-lg-10">
                                            <label>Productos</label>
                                            <select class="form-control" name="fk_idProducto">
                                                <option value="0">--Seleccione--</option>
                                                <?php
                                                    $tprod = new ProductoModel();
                                                    foreach($tprod->Listar() as $tproduc):
                                                ?>
                                                <option value="<?php echo $tproduc->__GET('idProducto') ?>"
                                                <?php echo $tproduc->__GET('idProducto') == $alm->__GET('idProducto') ? 'selected' : ''?>>
                                                <?php echo $tproduc->__GET('Nombre_producto'); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <label>Cantidad</label>
                                            <input class="form-control" name="Cantidad" required="" autocomplete="off" value="<?php echo $alm->__GET('Numero_mesa'); ?>">
                                        </div>

                                        <div class="form-group col-lg-5">
                                                <label>Total: <?php echo "$", $alm->__GET('Total_factura'); ?></label>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Imprimir factura</button>
                                        <button type="reset" class="btn btn-primary btn-lg">Limpiar factura</button>
                                    </form>
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
