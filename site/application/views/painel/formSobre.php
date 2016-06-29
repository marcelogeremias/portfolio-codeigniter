	<main class="sobre interna">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-10 col-sm-offset-1">

					<?php echo validation_errors('<div class="col-xs-12 text-center"><div class="alert alert-danger">', '</div></div>'); ?>
					<?php echo isset( $erro ) ? '<div class="alert alert-danger">' . $erro . '</div>' : ''; ?>

					<div class="col-xs-12 col-sm-10 col-sm-offset-1">
						<?php
							$attributes = array('class'=>'form-trabalho');
							echo form_open(base_url( 'painel/sobre' ),$attributes);
						?>
						<div class="form-group col-xs-12">
							<?php
								echo form_label('Nome', 'nome');

								$attributes = array(
									'name' => 'nome',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite o nome',
									'value' => $usuario['usua_nm']
								);
								echo form_input($attributes);
							?>
						</div>
						<div class="form-group col-xs-12">
							<?php
								echo form_label('Nome', 'nome');

								$attributes = array(
									'type' => 'email',
									'name' => 'email',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite o e-mail',
									'value' => $usuario['usua_em']
								);
								echo form_input($attributes);
							?>
						</div>
						<div class="form-group col-xs-12">
							<?php
								echo form_label('Descrição', 'descricao');

								$attributes = array(
									'name' => 'descricao',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite a descrição',
									'rows' => 5,
									'value' => $usuario['usua_ds']
								);
								echo form_textarea($attributes);
							?>
						</div>

						<?php
							echo form_hidden('id', $usuario['usua_id']);
						?>

						<button class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit">Atualizar</button>
						<?php echo form_close(); ?>
					</div>

				</div>

			</div>

		</div>

	</main>