<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des archives</h3>
				<div class="box-tools">
					<a href="<?php echo site_url('archive/add'); ?>" class="btn btn-success btn-sm">Ajouter</a>
				</div>
			</div>
			<div class="box-body">
				<table class="table table-striped">
					<tr>
						<th>N°</th>
						<th>Code</th>
						<th>Nom</th>
						<th>Archive le</th>
						<th>Archiver par</th>
						<th>entreprise</th>
						<th>Actions</th>
					</tr>
					<?php
					$i = 1;
					$user_k = null;
					foreach($archives as $archive){
						foreach ($users as $user) {
							if ($archive->archiver_par == $user->id){
								$user_k = $user;
								break;
							}
						}?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo strtoupper($archive->codeArchi); ?></td>
							<td><?php echo ucfirst($archive->nom); ?></td>
							<td><?php echo nice_date($archive->archiver_le,'d-m-Y H:i:s') ?></td>
							<td><?php echo ($user_k) ? ucwords($user_k->nom_complet) : "" ?></td>
							<td><?php echo strtoupper($archive->entreprise) ?></td>
							<td>
								<a class="btn btn-info btn-xs" href="<?php echo site_url('archive/download/' . $archive->idArchi); ?>"
								   target="_blank"><span class="fa fa-download"></span> Télécharger</a>
								<a href="<?= site_url('') ?>"
								   class="btn btn-success btn-xs"><span class="fa fa-eye"></span> Voir</a>
							</td>
						</tr>
						<?php $i++;
					} ?>
				</table>
				<div class="pull-right">
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
