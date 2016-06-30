	<?php
		if(!$this->session->userdata('u_id')){
			redirect(base_url('acessar'));
		}
	?>
	
	<main class="contatos interna">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-10 col-sm-offset-1">

					<h1>Contatos</h1>

					<table class="table table-striped">
						<thead> 
							<tr> 
								<th>#</th> 
								<th>Nome</th> 
								<th>Ações</th> 
							</tr> 
						</thead>
						<tbody>
					<?php foreach($contatos as $contato): ?>

						<tr>
							<td><?php echo $contato['cont_id']; ?></td>
							<td><?php echo $contato['cont_nm']; ?></td>
							<td>
								<a href="<?php echo base_url('painel/contatos/' . $contato['cont_id']); ?>" class="btn btn-info">Ver</a>
							</td>
						</tr>
						
					<?php endforeach; ?>
						</tbody>
					</table>
					
				</div>

			</div>

		</div>

	</main>