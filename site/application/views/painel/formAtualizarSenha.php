	<?php
		if(!$this->session->userdata('u_id')){
			redirect(base_url('acessar'));
		}
	?>
	<main class="login interna">
		<div class="container">
			<div class="row">
				<h1>Acessar</h1>
				<?php echo validation_errors('<div class="col-xs-12 text-center"><div class="alert alert-danger">', '</div></div>'); ?>
				<?php echo isset( $erro ) ? '<div class="alert alert-danger">' . $erro . '</div>' : ''; ?>
				<div class="col-xs-12 col-sm-10 col-sm-offset-1">
					<?php
						$attributes = array('class'=>'form-login');
						echo form_open(base_url('atualizarSenha'),$attributes);
					?>
						<div class="form-group col-xs-12 col-sm-6">
							<?php
								echo form_label('Senha antiga', 'senhaAntiga');
								
								$attributes = array(
									'name' => 'senhaAntiga',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite a senha antiga'
								);
								echo form_password($attributes);
							?>
						</div>
						<div class="form-group col-xs-12 col-sm-6">
							<?php
								echo form_label('Nova senha', 'novaSenha');
								
								$attributes = array(
									'name' => 'novaSenha',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite a senha'
								);
								echo form_password($attributes);
							?>
						</div>
						<button class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit">Atualizar senha</button>
					<?php
						echo form_close();
					?>
				</div>
			</div>
		</div>
	</main>