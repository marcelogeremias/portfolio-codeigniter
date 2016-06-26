	<main class="contato interna">
		<div class="container">
			<div class="row">
				<h1>Contato</h1>
				<?php echo validation_errors('<div class="col-xs-12 text-center"><div class="alert alert-danger">', '</div></div>'); ?>
				<div class="col-xs-12 col-sm-10 col-sm-offset-1">
					<?php
						$attributes = array('class'=>'form-contato');
						echo form_open(base_url('enviarContato'),$attributes);
					?>
						<div class="form-group col-xs-12 col-sm-4">
							<?php
								echo form_label('Nome', 'nome');
								
								$attributes = array(
									'name' => 'nome',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite seu nome'
								);
								echo form_input($attributes);
							?>
						</div>
						<div class="form-group col-xs-12 col-sm-4">
							<?php
								echo form_label('E-mail', 'email');
								
								$attributes = array(
									'name' => 'email',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite seu e-mail'
								);
								echo form_input($attributes);
							?>
						</div>
						<div class="form-group col-xs-12 col-sm-4">
							<?php
								echo form_label('Assunto', 'assunto');
								
								$attributes = array(
									'name' => 'assunto',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite o assunto'
								);
								echo form_input($attributes);
							?>
						</div>
						<div class="form-group col-xs-12">
							<?php
								echo form_label('Mensagem', 'mensagem');
								
								$attributes = array(
									'name' => 'mensagem',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'rows' => '5',
									'placeholder' => 'Digite a mensagem'
								);
								echo form_textarea($attributes);
							?>
						</div>
						<button class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit">Enviar</button>
					<?php
						echo form_close();
					?>
				</div>
			</div>
		</div>
	</main>