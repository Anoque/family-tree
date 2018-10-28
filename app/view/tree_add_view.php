<section>
	<form action="/tree/add<?= ($data['id'] != 0) ? ("/" . $data['id']) : "" ?>" method="post">
		<input type="hidden" name="id" value="<?=$data['id']?>">
		<div class="input-field col s6">
			<label for="last_name">Name</label>
			<input id="name" name="name" type="text" class="validate" value="<?=$data['name']?>">
		</div>
		<br>
		<label for="parent_id">Parent</label>
		<? if ($data['members']): ?>
		<div class="input-field col s12">
			<select name="parent_id" id="parent_id">
				<option value="0">No parent</option>
				<? foreach($data['members'] as $value): ?>
					<option value="<?=$value['id']?>" <? if ($data['parent_id'] == $value['id']): ?> selected<? endif; ?>><?=$value['name']?></option>
				<? endforeach; ?>
			</select>
		</div>
		<? endif; ?>
		<div class="input-field col s6">
			<label for="partner">Partner</label>
			<input id="partner" name="partner" type="text" value="<?=$data['partner']?>">
			<span class="helper-text" data-error="wrong" data-success="right">Optional</span>
		</div>
		<div class="input-field col s12">
			<label for="description">Description</label>
			<textarea id="description" name="description" class="materialize-textarea"><?= $data['description'] ?></textarea>
			<span class="helper-text" data-error="wrong" data-success="right">Optional</span>
		</div>
		<div class="switch">
			<br>
			<label for="sex">
				Male
				<input type="checkbox" name="sex" id="sex" <?=($data['sex'] == 1) ? "checked" : ""?>>
				<span class="lever"></span>
				Female
			</label>
		</div>
		<br>
		<button class="waves-effect waves-light btn" type="submit"><?= ($data['id'] == 0) ? "Add" : "Edit" ?></button>
	</form>
</section>

<? if (isset($data['success'])): ?>
	<section>
		<?= ($data['success']) ? "Member " . (($data['id'] == 0) ? "added" : "edited" ) : "Error" ?>
	</section>
<? endif; ?>