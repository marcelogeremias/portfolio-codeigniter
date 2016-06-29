<?php 
	$this->load->view('common/header'); //let's assume that we already have 'header' view file
	$data_atual = strtotime("now");
?>
	<main class="documento-pdf">
		<section class="home interna">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1">
						<h1>Sobre <?php echo $usuario["usua_nm"]; ?></h1>
						<img src="<?php echo base_url("assets/images/marcelo.jpg"); ?>" alt="Marcelo Geremias" class="foto-sobre">
						<span><strong>E-mail: </strong><?php echo $usuario["usua_em"]; ?></span>
						<div class="descricao">
							<?php echo $usuario["usua_ds"]; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="formacoes interna">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1">
						<h1>Formações</h1>
						<?php 
							foreach($formacoes as $formacao): 
								$data_ter = strtotime($formacao['form_ter_dt']);
						?>
							<div class="item-formacao col-xs-12 col-sm-4">
								<h2><?php echo $formacao['form_nm']; ?></h2>
								<span class="instituicao"><?php echo $formacao['form_in']; ?></span>
								<span class="tipo"><?php echo $formacao['form_tp']; ?></span>
								<span class="dt-inicio">Início em <?php echo strftime('%B de %Y', strtotime($formacao['form_ini_dt'])); ?></span>
								<span class="dt-termino">
									<?php 
										echo ( $data_atual < $data_ter) ? 'Conclusão prevista para ' : 'Término em '; 
										echo strftime('%B de %Y', $data_ter); ?>
								</span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>

		<section class="trabalhos interna">

			<div class="container">

				<div class="row">

					<div class="col-xs-12 col-sm-10 col-sm-offset-1">

						<h1>Trabalhos</h1>

						<?php foreach($trabalhos as $trabalho): ?>

							<div class="item-formacao col-xs-12">

								<h2><?php echo $trabalho['trab_nm']; ?></h2>

								<div class="descricao">

									<?php echo $trabalho['trab_ds']; ?>

								</div>

							</div>

						<?php endforeach; ?>

					</div>

				</div>

			</div>

		</section>
	</main>
<?php 
	$this->load->view('common/footer'); //let's assume that we already have 'footer' view file
?>