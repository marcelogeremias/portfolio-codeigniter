	<main class="home">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1">
					<h2>Sobre <?php echo $usuario["usua_nm"]; ?></h2>
					<img src="<?php echo base_url("assets/images/marcelo.jpg"); ?>" alt="Marcelo Geremias" class="foto-sobre">
					<span><strong>E-mail: </strong><?php echo $usuario["usua_em"]; ?></span>
					<div class="descricao">
						<?php echo $usuario["usua_ds"]; ?>
					</div>
				</div>
			</div>
		</div>
	</main>