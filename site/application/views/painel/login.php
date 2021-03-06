	<?php
		if($this->session->userdata('u_id')){
			redirect(base_url('painel'));
		}
	?>
	<main class="login interna">
		<div class="container">
			<div class="row">
				<h1>Acessar</h1>
				<?php echo validation_errors('<div class="col-xs-12 text-center"><div class="alert alert-danger">', '</div></div>'); ?>
				<?php echo isset( $erro ) ? '<div class="alert alert-danger">' . $erro . '</div>' : ''; ?>
				<div class="col-xs-12 col-sm-6 col-sm-offset-3">
					<?php
						$attributes = array('class'=>'form-login');
						echo form_open(base_url('acessar'),$attributes);
					?>
						<div class="form-group col-xs-12">
							<?php
								echo form_label('E-mail', 'email');
								
								$attributes = array(
									'name' => 'email',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite o e-mail'
								);
								echo form_input($attributes);
							?>
						</div>
						<div class="form-group col-xs-12">
							<?php
								echo form_label('Senha', 'senha');
								
								$attributes = array(
									'name' => 'senha',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite a senha'
								);
								echo form_password($attributes);
							?>
						</div>
						<button class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit">Acessar</button>
					<?php
						echo form_close();
					?>
				</div>
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 text-center">
					<a href="<?php echo base_url('recuperarSenha'); ?>">Recuperar senha</a>
				</div>
			</div>
		</div>
	</main>