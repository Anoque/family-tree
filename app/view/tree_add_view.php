<section>
	<form action="/tree/add" method="post">
		<label for="name">Name</label>
		<input type="text" name="name" id="name">
		<br>
		<label for="parent_id">Parent</label>
		<? if ($data['members']): ?>
			<select name="parent_id" id="parent_id">
				<option value="0">No parent</option>
				<? foreach($data['members'] as $value): ?>
					<option value="<?=$value['id']?>"><?=$value['name']?></option>
				<? endforeach; ?>
			</select>
		<? endif; ?>
		<br>
		<button class="mdl-button mdl-js-button mdl-button--raised" type="submit">
			Add
		</button>
	</form>
</section>

<? if (isset($data['success'])): ?>
	<section>
		<?= ($data['success']) ? "Members added" : "Error" ?>
	</section>
<? endif; ?>