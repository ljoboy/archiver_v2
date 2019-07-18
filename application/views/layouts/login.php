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

<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="<?= base_url(); ?>"><?= APP_NAME ?></a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Authentifiez-vous pour commencer</p>
		<hr />
		<?php
		if (isset($this->session->error)) :
			?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> Alerte !</h4>
				<?= $this->session->error ?>
			</div>
		<?php elseif (isset($this->session->succes)) :
			?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> Alerte !</h4>
				<?= $this->session->succes ?>
			</div>
		<?php endif; ?>

		<?= form_open(site_url('auth/index')) ?>
		<div class="form-group has-feedback">
			<label for="pseudo"></label>
			<input autocomplete="username" class="form-control" id="pseudo" name="pseudo" placeholder="Nom d'utilisateur"
				   type="text" value="<?= $this->session->pseudo; ?>"/>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			<span class="text-danger"><?php echo form_error('pseudo'); ?></span>
		</div>
		<div class="form-group has-feedback">
			<label for="mdp"></label>
			<input autocomplete="current-password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe"
				   type="password"/>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<span class="text-danger"><?php echo form_error('mdp'); ?></span>
		</div>
		<div class="row">
			<div class="col-xs-8">
			</div>
			<!-- /.col -->
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Envoyer <i
						class="fa fa-paper-plane"></i></button>
			</div>
			<!-- /.col -->
		</div>
		<?= form_close() ?>

		<div class="social-auth-links text-center">
			<p>- OU -</p>
<!--			<a href="--><?//= site_url('auth/ajouter'); ?><!--" class="btn btn-block btn-social btn-facebook btn-flat"><i-->
<!--					class="fa fa-user-plus"></i>-->
<!--				Créer un compte</a>-->
			<a href="<?= site_url('auth/modifier') ?>" class="btn btn-block btn-social btn-google btn-flat"><i
					class="fa fa-unlock-alt"></i>
				Mot de passe oublié ?</a>
		</div>
	</div>
	<!-- /.login-box-body -->
	<footer class="footer text-center">
			<b>Code with <i class="fa fa-heart text-red"></i> by <a href="#">Laure MWANSA</a></b>
	</footer>
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/js/jquery-2.2.3.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>

</html>
