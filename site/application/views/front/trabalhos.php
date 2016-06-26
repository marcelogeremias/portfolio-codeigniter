	<main class="trabalhos interna">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1">
					<h1>Trabalhos</h1>
					<?php foreach($trabalhos as $trabalho): ?>
						<h2><?php echo $trabalho['trab_nm']; ?></h2>
						<div class="descricao">
							<?php echo $trabalho['trab_ds']; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</main>