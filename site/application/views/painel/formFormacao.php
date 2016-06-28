	<?php
		$id = isset( $formacao['form_id'] ) ? $formacao['form_id'] : 0;
		$nome = isset( $formacao['form_nm'] ) ? $formacao['form_nm'] : '';
		$instituicao = isset( $formacao['form_in'] ) ? $formacao['form_in'] : '';
		$tipo = isset( $formacao['form_tp'] ) ? $formacao['form_tp'] : '';
		$inicio = isset( $formacao['form_ini_dt'] ) ? $formacao['form_ini_dt'] : '';
		$termino = isset( $formacao['form_ter_dt'] ) ? $formacao['form_ter_dt'] : '';
		$urlForm = 'painel/formacoes/form/' . $id; 
		$botao = ($id == 0) ? 'Cadastrar' : 'Atualizar';
	?>
	<main class="formacoes interna">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-10 col-sm-offset-1">

					<?php echo validation_errors('<div class="col-xs-12 text-center"><div class="alert alert-danger">', '</div></div>'); ?>
					<?php echo isset( $erro ) ? '<div class="alert alert-danger">' . $erro . '</div>' : ''; ?>

					<div class="col-xs-12 col-sm-10 col-sm-offset-1">
						<?php
							$attributes = array('class'=>'form-formacao');
							echo form_open(base_url( $urlForm ),$attributes);
						?>
						<div class="form-group col-xs-12">
							<?php
								echo form_label('Nome', 'nome');

								$attributes = array(
									'name' => 'nome',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite o nome',
									'value' => $nome
								);
								echo form_input($attributes);
							?>
						</div>

						<div class="form-group col-xs-12">
							<?php
								echo form_label('Instituição', 'instituicao');

								$attributes = array(
									'name' => 'instituicao',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite a instituição',
									'value' => $instituicao
								);
								echo form_input($attributes);
							?>
						</div>

						<div class="form-group col-xs-12 col-sm-4">
							<?php
								echo form_label('Tipo de formação', 'tipo');

								$attributes = array(
									'name' => 'tipo',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite o tipo de formação',
									'value' => $tipo
								);
								echo form_input($attributes);
							?>
						</div>

						<div class="form-group col-xs-12 col-sm-4">
							<?php
								echo form_label('Data de início', 'inicio');

								$attributes = array(
									'name' => 'inicio',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite a data de início da formação',
									'value' => $inicio
								);
								echo form_input($attributes);
							?>
						</div>

						<div class="form-group col-xs-12 col-sm-4">
							<?php
								echo form_label('Data de término', 'termino');

								$attributes = array(
									'name' => 'termino',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite a data de término da formação',
									'value' => $termino
								);
								echo form_input($attributes);
							?>
						</div>

						<?php
							echo form_hidden('id', $id);
						?>

						<button class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit"><?php echo $botao; ?></button>
						<?php
						echo form_close();
						?>
					</div>

				</div>

			</div>

		</div>

	</main>