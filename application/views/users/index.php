<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des utilisateurs</h3>
				<div class="box-tools">
					<a href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-sm">Ajouter</a>
				</div>
			</div>
			<div class="box-body">
				<table class="table table-striped">
					<tr>
						<th>N°</th>
						<th>Nom Complet</th>
						<th>Type</th>
						<th>Cree Le</th>
						<th>Actions</th>
					</tr>
					<?php
					$i = 1;
					$type = ['utilisateur', 'archiviste', 'administrateur'];
					foreach($users as $user){ ?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo ucwords($user->nom_complet); ?></td>
							<td><?php echo ucfirst($type[$user->level]); ?></td>
							<td><?php echo nice_date($user->creer_le,'d-m-Y H:i:s') ?></td>
							<td>
								<a href="<?php echo site_url('user/edit/'.$user->id); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modifier</a>
								<a href="<?php echo site_url('user/remove/'.$user->id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('&Egrave;tes-vous s&ugrave;r de vouloir supprimer cet utilisateur ?')"><span class="fa fa-trash"></span> Effacer</a>
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
