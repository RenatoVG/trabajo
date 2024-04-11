<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pagina Principal</title>


    <link href="<?php echo RUTA . 'assets/'; ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo RUTA . 'assets/'; ?>css/snackbar.min.css" rel="stylesheet">
    <link href="<?php echo RUTA . 'assets/'; ?>css/iframe.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA . 'assets/'; ?>css/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA . 'assets/'; ?>css/dataTables.dateTime.min.css" />
</head>
<?php $mini = false;
if (!empty($_GET['pagina'])) {
    if ($_GET['pagina'] == 'ventas' || $_GET['pagina'] == 'compras') {
        $mini = true;
    }
}
?>

<body id="page-top" class="<?php echo ($mini) ? 'sidebar-toggled' : ''; ?>">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion <?php echo ($mini) ? 'toggled' : ''; ?>" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="plantilla.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="assets/img/logo.png" alt="LOGO-PNG" width="50">
                </div>
                <div class="sidebar-brand-text mx-3">POLISHOES SRL <sup>2.0</sup></div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item <?php echo (empty($_GET['pagina'])) ? 'bg-gradient-info' : ''; ?>">
                <a class="nav-link" href="plantilla.php">
                    <i class="fas fa-chart-pie"></i>
                    <span>Principal</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Contenido
            </div>
            <?php if (!empty($clientes)) { ?>
                <li class="nav-item <?php echo (!empty($_GET['pagina'])  && $_GET['pagina'] == 'clientes') ? 'bg-gradient-info' : ''; ?>">
                    <a class="nav-link" href="?pagina=clientes">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Clientes</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($proveedor)) { ?>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item <?php echo (!empty($_GET['pagina'])  && $_GET['pagina'] == 'proveedor') ? 'bg-gradient-info' : ''; ?>">
                    <a class="nav-link" href="?pagina=proveedor">
                        <i class="fas fa-store"></i>
                        <span>Proveedores</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($usuarios)) { ?>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item <?php echo (!empty($_GET['pagina'])  && $_GET['pagina'] == 'usuarios') ? 'bg-gradient-info' : ''; ?>">
                    <a class="nav-link" href="?pagina=usuarios">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($productos)) { ?>
                <hr class="sidebar-divider d-none d-md-block">

                <li class="nav-item <?php echo (!empty($_GET['pagina'])  && $_GET['pagina'] == 'productos') ? 'bg-gradient-info' : ''; ?>">
                    <a class="nav-link" href="?pagina=productos">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Productos</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($nueva_compra) || !empty($compras)) { ?>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item <?php echo (!empty($_GET['pagina'])  && $_GET['pagina'] == 'compras' || !empty($_GET['pagina'])  && $_GET['pagina'] == 'historial_compras') ? 'bg-gradient-info' : ''; ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCompra" aria-expanded="true" aria-controls="collapseCompra">
                        <i class="fas fa-cart-plus"></i>
                        <span>Compras</span>
                        <i class="fas fa-chevron-right float-right"></i>
                    </a>
                    <div id="collapseCompra" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            if (!empty($nueva_compra)) { ?>
                                <a class="collapse-item" href="?pagina=compras">Nueva compra</a>
                            <?php }
                            if (!empty($compras)) { ?>
                                <a class="collapse-item" href="?pagina=historial_compras">Lista compras</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <hr class="sidebar-divider d-none d-md-block">
            <?php if (!empty($nueva_venta) || !empty($ventas)) { ?>
                <li class="nav-item <?php echo (!empty($_GET['pagina'])  && $_GET['pagina'] == 'ventas' || !empty($_GET['pagina'])  && $_GET['pagina'] == 'historial') ? 'bg-gradient-info' : ''; ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVenta" aria-expanded="true" aria-controls="collapseVenta">
                        <i class="fas fa-cash-register"></i>
                        <span>Ventas</span>
                        <i class="fas fa-chevron-right float-right"></i>
                    </a>
                    <div id="collapseVenta" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            if (!empty($nueva_venta)) { ?>
                                <a class="collapse-item" href="?pagina=ventas">Nueva venta</a>
                            <?php }
                            if (!empty($ventas)) { ?>
                                <a class="collapse-item" href="?pagina=historial">Lista ventas</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php if (!empty($configuracion)) { ?>
                <hr class="sidebar-divider d-none d-md-block">

                <li class="nav-item <?php echo (!empty($_GET['pagina']) && $_GET['pagina'] == 'configuracion') ? 'bg-gradient-info' : ''; ?>">
                    <a class="nav-link" href="?pagina=configuracion">
                        <i class="fas fa-user-cog"></i>
                        <span>Datos</span>
                    </a>
                </li>
            <?php } ?>
            <div class="text-center d-none d-md-inline mt-3">
                <button class="rounded-circle border-0" id="sidebarToggle"><i class="fas fa-chevron-circle-left text-gray-400"></i></button>
            </div>

        </ul>
     
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <!--  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombre']; ?></span> -->
                                <img class="img-profile rounded-circle" src="<?php echo RUTA .  'assets/img/avatar.png'; ?>">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
             
                <div class="container-fluid">