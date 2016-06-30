	<?php
		if(!$this->session->userdata('u_id')){
			redirect(base_url('acessar'));
		}
	?>
	
	<?php $data_inse = strtotime($contato['cont_inse_dt']); ?>
	<main class="contatos interna">

		<div class="container">

			<div class="row">

				<div class="col-xs-12">
					<h1>Contato feito pelo <?php echo $contato['cont_nm']; ?></h1>
				</div>

				<div class="col-xs-12 col-sm-4">
					<strong>E-mail: </strong> <?php echo $contato['cont_em']; ?>
				</div>

				<div class="col-xs-12 col-sm-4">
					<strong>Assunto: </strong> <?php echo $contato['cont_as']; ?>
				</div>

				<div class="col-xs-12 col-sm-4">
					<strong>Data do contato: </strong> <?php echo strftime('%d de %B de %Y às %T', $data_inse); ?>
				</div>

				<div class="col-xs-12">
					<strong>Mensagem: </strong> <?php echo $contato['cont_ms']; ?>
				</div>

			</div>

		</div>

	</main>