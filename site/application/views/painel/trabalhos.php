	<?php
		if(!$this->session->userdata('u_id')){
			redirect(base_url('acessar'));
		}
	?>
	<main class="trabalhos interna">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-10 col-sm-offset-1">

					<h1>Trabalhos</h1>

					<table class="table table-striped">
						<thead> 
							<tr> 
								<th>#</th> 
								<th>Título</th> 
								<th>Ações</th> 
							</tr> 
						</thead>
						<tbody>
					<?php foreach($trabalhos as $trabalho): ?>

						<tr>
							<td><?php echo $trabalho['trab_id']; ?></td>
							<td><?php echo $trabalho['trab_nm']; ?></td>
							<td>
								<a href="<?php echo base_url('painel/trabalhos/form/' . $trabalho['trab_id']); ?>" class="btn btn-info">Atualizar</a>
								<a href="<?php echo base_url('painel/trabalhos/remover/' . $trabalho['trab_id']); ?>" class="btn btn-danger">Remover</a>
							</td>
						</tr>
						
					<?php endforeach; ?>
						</tbody>
					</table>

					<a href="<?php echo base_url('painel/trabalhos/form/0'); ?>" class="btn btn-info">Adicionar</a>

				</div>

			</div>

		</div>

	</main>