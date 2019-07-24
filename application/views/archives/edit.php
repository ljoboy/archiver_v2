<?= form_open('archive/edit/'.$archive->idArchi,['class'=>'form-horizontal']); ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Modifier ces informations :</h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<img src="<?= base_url('assets/img/File_96px.png') ?>" alt="<?= $archive->url ?>" class="img-thumbnail img-responsive" width="99%" />
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="code">Code :</label>
						<div class="col-sm-10">
							<input value="<?= $archive->codeArchi ?>" class="form-control" id="code" name="code" required type="text"/>
							<span class="text-danger"><?php echo form_error('code'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="nom">Nom :</label>
						<div class="col-sm-10">
							<input value="<?= $archive->nom ?>" class="form-control" id="nom" name="nom" required type="text"/>
							<span class="text-danger"><?php echo form_error('nom'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="entreprise">Entreprise :</label>
						<div class="col-sm-10">
							<input value="<?= $archive->entreprise ?>" class="form-control" id="entreprise" name="entreprise" required type="text"/>
							<span class="text-danger"><?php echo form_error('entreprise'); ?></span>
						</div>
					</div>
				</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-primary">Enregistrer</button>
				</div>
			</div>
		</div>
		<!-- /.box-body -->
	</div>
<?= form_close(); ?>
