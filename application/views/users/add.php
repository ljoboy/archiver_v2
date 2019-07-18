<?= form_open('user/add',['class'=>'form-horizontal']); ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Completer ces informations :</h3>
		</div>
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="nom_complet">Nom complet :</label>
				<div class="col-sm-10">
					<input required value="<?= $nom_complet ?>" type="text" class="form-control" placeholder="Nom complet" name="nom_complet" id="nom_complet"/>
					<span class="text-danger"><?php echo form_error('nom_complet'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="login">Nom d'utilisateur :</label>
				<div class="col-sm-10">
					<input required autocomplete="username" value="<?= $login ?>" type="text" class="form-control" placeholder="Nom d'utilisateur" name="login" id="login"/>
					<span class="text-danger"><?php echo form_error('login'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="mdp">Mot de passe :</label>
				<div class="col-sm-10">
					<input required autocomplete="current-password" type="password" class="form-control" placeholder="Mot de passe" name="mdp" id="mdp"/>
					<span class="text-danger"><?php echo form_error('mdp'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="mdp2">Confirmer le mot de passe :</label>
				<div class="col-sm-10">
					<input autocomplete="current-password" class="form-control" id="mdp2" name="mdp2"
						   placeholder="Confirmer le mot de passe" required type="password"/>
					<span class="text-danger"><?php echo form_error('mdp2'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="level">Type de compte :</label>
				<div class="col-sm-10">
					<select id="level" name="level" class="form-control select2" style="width: 100%;" required>
						<?php
						$level = isset($level) ? $level : AGENT_LEVEL;
						?>
						?>
						<option disabled>Choisissez le type de compte</option>
						<option value="<?= AGENT_LEVEL ?>" <?= ($level == AGENT_LEVEL) ?'selected' : '' ?>>Agent</option>
						<option value="<?= ARCHIVISTE_LEVEL ?>" <?= ($level == ARCHIVISTE_LEVEL) ?'selected' : '' ?>>Archiviste</option>
						<option value="<?= ADMIN_LEVEL ?>" <?= ($level == ADMIN_LEVEL) ?'selected' : '' ?>>Administrateur</option>
					</select>
				</div>
			</div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Enregistrer</button>
		</div>
	</div>
<?= form_close(); ?>
