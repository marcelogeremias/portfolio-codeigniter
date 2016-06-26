<?php 
	$data_atual = strtotime("now");
?>

	<main class="formacaos interna">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1">
					<h1>Formações</h1>
					<?php 
						foreach($formacoes as $formacao): 
							$data_ter = strtotime($formacao['form_ter_dt']);
					?>
						<div class="item-formacao col-xs-12 col-sm-4">
							<h2><?php echo $formacao['form_nm']; ?></h2>
							<span class="instituicao"><?php echo $formacao['form_in']; ?></span>
							<span class="tipo"><?php echo $formacao['form_tp']; ?></span>
							<span class="dt-inicio">Início em <?php echo strftime('%B de %Y', strtotime($formacao['form_ini_dt'])); ?></span>
							<span class="dt-termino">
								<?php 
									echo ( $data_atual < $data_ter) ? 'Conclusão prevista para ' : 'Término em '; 
									echo strftime('%B de %Y', $data_ter); ?>
							</span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</main>