<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Marcelo Geremias">
	<title><?php echo isset( $title ) ? $title : "Marcelo Geremias"; ?></title>

	<!-- Bootstrap core CSS -->			
	<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>"	rel="stylesheet">

	<!-- Bootstrap theme -->
	<link href="<?php echo base_url ( 'bootstrap/css/bootstrap-theme.min.css' );?>"	rel="stylesheet">

	<link href="<?php echo base_url ( 'assets/css/style.css' );?>" rel="stylesheet">
	<link href="<?php echo base_url ( 'assets/css/painel.css' );?>" rel="stylesheet">

	<script src="<?php echo base_url('assets/js/jquery/jquery.js');?>"></script>
	<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>	

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>
		
		<body role="document">
			<header>
				<section id="header-topo">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<a href="<?php echo base_url(); ?>">Marcelo Geremias</a>
							</div>
						</div>
					</div>
				</section>
				<?php if($this->session->userdata('u_id')) : ?>
					<section id="header-menu">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<nav class="navbar">
										<div class="container-fluid">
											<!-- Brand and toggle get grouped for better mobile display -->
											<div class="navbar-header">
												<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
													<span class="sr-only">Toggle navigation</span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
												</button>
											</div>

											<!-- Collect the nav links, forms, and other content for toggling -->
											<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
												<ul class="nav navbar-nav">
													<li class="active">
														<a href="<?php echo base_url('painel'); ?>">Home</a>
													</li>
													<li>
														<a href="<?php echo base_url('painel/trabalhos'); ?>">Trabalhos</a>
													</li>
													<li>
														<a href="<?php echo base_url('painel/formacoes'); ?>">Formações</a>
													</li>
													<li>
														<a href="<?php echo base_url('painel/contato'); ?>">Contato</a>
													</li>
													<li>
														<a href="<?php echo base_url('sair'); ?>">Sair</a>
													</li>
												</ul>
											</div><!-- /.navbar-collapse -->
										</div><!-- /.container-fluid -->
									</nav>
								</div>
							</div>
						</div>
					</section>
				<?php endif; ?>
			</header>