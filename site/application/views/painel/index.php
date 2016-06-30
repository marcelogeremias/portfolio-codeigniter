	<?php
		if(!$this->session->userdata('u_id')){
			redirect(base_url('acessar'));
		}
	?>
	<main class="index interna">
		<section class="apresentacao">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1">
						<p>Você está acessando o painel administrativo do site "Marcelo Geremias". Navegue através do menu acima para gerenciar as informações.</p>
					</div>
				</div>
			</div>
		</section>
	</main>