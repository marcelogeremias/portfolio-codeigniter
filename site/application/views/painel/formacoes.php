	<?php
		if(!$this->session->userdata('u_id')){
			redirect(base_url('acessar'));
		}
	?>
	<main class="formacoes interna">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-10 col-sm-offset-1">

					<h1>Formações</h1>

					<table class="table table-striped">
						<thead> 
							<tr> 
								<th>#</th> 
								<th>Título</th> 
								<th>Ações</th> 
							</tr> 
						</thead>
						<tbody>
					<?php foreach($formacoes as $formacao): ?>

						<tr>
							<td><?php echo $formacao['form_id']; ?></td>
							<td><?php echo $formacao['form_nm']; ?></td>
							<td>
								<a href="<?php echo base_url('painel/formacoes/form/' . $formacao['form_id']); ?>" class="btn btn-info">Atualizar</a>
								<a href="<?php echo base_url('painel/formacoes/form/remover/' . $formacao['form_id']); ?>" class="btn btn-danger">Remover</a>
							</td>
						</tr>
						
					<?php endforeach; ?>
						</tbody>
					</table>

					<a href="<?php echo base_url('painel/formacoes/form/0'); ?>" class="btn btn-info">Adicionar</a>

				</div>

			</div>

		</div>

	</main>