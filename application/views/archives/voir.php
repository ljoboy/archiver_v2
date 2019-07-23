<?= form_open('archive/step_2',['class'=>'form-horizontal']); ?>
<?php
foreach ($users as $user) {
	if ($archive->archiver_par == $user->id){
		$user_k = $user;
		break;
	}
}
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Informations sur le fichier :</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/File_96px.png') ?>" alt="<?= $archive->url ?>" class="img-thumbnail img-responsive" width="50%" />
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="code">Code :</label>
					<div class="col-sm-8">
						<input value="<?= $archive->codeArchi ?>" disabled class="form-control" id="code" name="code" required type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="nom">Nom :</label>
					<div class="col-sm-8">
						<input value="<?= $archive->nom ?>" disabled class="form-control" id="nom" name="nom" required type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="entreprise">Entreprise :</label>
					<div class="col-sm-8">
						<input value="<?= $archive->entreprise ?>" disabled class="form-control" id="entreprise" name="entreprise" required type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="entreprise">Enregistrer par :</label>
					<div class="col-sm-8">
						<input value="<?= ucwords($user_k->nom_complet) ?>" disabled class="form-control" id="entreprise" name="entreprise" required type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="entreprise">Enregistrer le :</label>
					<div class="col-sm-8">
						<input value="<?= nice_date($archive->archiver_le,'d-m-Y H:i:s')?>" disabled class="form-control" id="entreprise" name="entreprise" required type="text"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.box-body -->
</div>
<?= form_close(); ?>
