<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= APP_NAME ?> | <?= isset($title) ? ucfirst($title) : 'Vos archives en sécurité' ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/_all-skins.min.css');?>">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- Google Font -->
		<link rel="stylesheet"
			  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><?= APPNAME_INIT ?></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><?= APP_NAME ?></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url('assets/img/avatarm.png');?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?= ucwords($this->session->nom_complet) ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url('assets/img/avatarm.png');?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?= ucwords($this->session->nom_complet) ?> - Web Developer
                                        <small>Membre depuis <?= nice_date($this->session->cree_le,"M, Y") ?></small>
                                    </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?= site_url('user/profil') ?>" class="btn btn-default btn-flat">Profil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= site_url('user/logout') ?>" class="btn btn-default btn-flat">Déconnexion</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url('assets/img/avatarm.png');?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?= ucwords($this->session->nom_complet) ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MENU PRINCIPAL</li>
                        <li>
                            <a href="<?php echo site_url('archive/dashboard');?>">
                                <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
                            </a>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Utilisateurs</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('user/add');?>"><i class="fa fa-plus"></i> Ajouter</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('user/index');?>"><i class="fa fa-list-ul"></i> Lister</a>
                                </li>
							</ul>
                        </li>
						<li>
							<a href="#">
								<i class="fa fa-archive"></i> <span>Archives</span>
							</a>
							<ul class="treeview-menu">
								<li class="active">
									<a href="<?php echo site_url('archive/add');?>"><i class="fa fa-plus"></i> Ajouter</a>
								</li>
								<li>
									<a href="<?php echo site_url('archive/index');?>"><i class="fa fa-list-ul"></i> Lister</a>
								</li>
							</ul>
						</li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <?= (isset($_view)) ? $_view : "" ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Code with <i class="fa fa-heart text-red"></i> by <a href="#">Laure MWANSA</a></b>
				</div>
               <strong>&copy; Copyright <?= date('Y') ?> <a href="<?= base_url() ?>"><?= APP_NAME ?></a></strong> | Tous droits réservés
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->

                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Ajouter the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url('assets/js/jquery-2.2.3.min.js');?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url('assets/js/demo.js');?>"></script>
        <!-- DatePicker -->
        <script src="<?php echo base_url('assets/js/moment.js');?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/global.js');?>"></script>
    </body>
</html>
