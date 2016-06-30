	<main class="home interna">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1">
					<h1>Sobre <?php echo $usuario["usua_nm"]; ?></h1>
					<img src="<?php echo base_url("assets/images/marcelo.jpg"); ?>" alt="Marcelo Geremias" class="foto-sobre">
					<span><strong>E-mail: </strong><a href="mailto:<?php echo $usuario["usua_em"]; ?>"><?php echo $usuario["usua_em"]; ?></a></span>
					<div class="descricao">
						<?php echo $usuario["usua_ds"]; ?>
					</div>

					<a href="<?php echo base_url('pdf'); ?>">
						<i class="fa fa-file-pdf-o" aria-hidden="true"></i>Baixar PDF
					</a>
				</div>
			</div>
		</div>
	</main>