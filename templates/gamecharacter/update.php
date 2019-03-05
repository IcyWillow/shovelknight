<article>
	<form action="/gameCharacter/doUpdate?id=<?= $gameCharacter->id ?>" method="post" class="col-6">
		<div class="form-group">
		  <label for="name">Character Name</label>
	  	<input id="name" name="name" type="text" value='<?= htmlentities($gameCharacter->name) ?>' class="form-control">
		</div>
		<div class="form-group">
		  <label for="picture_url">Picture Url</label>
	  	<input id="picture_url" name="picture_url" type="text" value='<?= htmlentities($gameCharacter->picture_url) ?>' class="form-control">
		</div>
		<div class="form-group">
		  <label for="weapon">Weapon</label>
	  	<input id="weapon" name="weapon" type="text" value='<?= htmlentities($gameCharacter->weapon) ?>' class="form-control">
		</div>
		<div class="form-group">
			<label  for="password">Description</label>
			<textarea id="description" name="description" rows="4" cols="50"><?= htmlentities($gameCharacter->description) ?></textarea>
		
		</div>
		<div class="form-group">
			<label  for="cstatement">Statement</label>
			<textarea id="cstatement"  class="form-control" name="cstatement"rows="4" cols="50"><?= htmlentities($gameCharacter->statement) ?></textarea>

		</div>
		<button type="submit" class="submit">Update Character</button>
	</form>
	<a title="Back" href="/gameCharacter/index" class="orientation">< Back</a>
	<a title="Home" href="/" class="orientation">Home</a>

</article>
<div class="side-img-3"></div>
