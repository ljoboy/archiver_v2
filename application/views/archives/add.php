<?= form_open_multipart('archive/add',['class'=>'form-horizontal']); ?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Completer ces informations :</h3>
		<hr>
		<?= $error ?>
	</div>
	<div class="box-body">
		<div class="form-group">
			<label class="col-sm-2 control-label" for="img">Image :</label>
			<div class="col-sm-10">
				<input accept="*" class="form-control" id="img" name="img" required type="file" size="20"/>
				<span class="text-danger"><?php echo form_error('img'); ?></span>
			</div>
		</div>

	</div>
	<!-- /.box-body -->
	<div class="box-footer">
		<button type="submit" class="btn btn-primary">Enregistrer</button>
	</div>
</div>
<?= form_close(); ?>
