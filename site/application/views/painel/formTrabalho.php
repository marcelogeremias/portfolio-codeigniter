	<?php
		if(!$this->session->userdata('u_id')){
			redirect(base_url('acessar'));
		}

		$id = isset( $trabalho['trab_id'] ) ? $trabalho['trab_id'] : 0;
		$nome = isset( $trabalho['trab_nm'] ) ? $trabalho['trab_nm'] : '';
		$descricao = isset( $trabalho['trab_ds'] ) ? $trabalho['trab_ds'] : '';
		$urlForm = 'painel/trabalhos/form/' . $id; 
		$botao = ($id == 0) ? 'Cadastrar' : 'Atualizar';
	?>
	<main class="trabalhos interna">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-10 col-sm-offset-1">

					<?php echo validation_errors('<div class="col-xs-12 text-center"><div class="alert alert-danger">', '</div></div>'); ?>
					<?php echo isset( $erro ) ? '<div class="alert alert-danger">' . $erro . '</div>' : ''; ?>

					<div class="col-xs-12 col-sm-10 col-sm-offset-1">
						<?php
						$attributes = array('class'=>'form-trabalho');
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
								echo form_label('Descrição', 'descricao');

								$attributes = array(
									'name' => 'descricao',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'placeholder' => 'Digite a descrição',
									'rows' => 5,
									'value' => $descricao
								);
								echo form_textarea($attributes);
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