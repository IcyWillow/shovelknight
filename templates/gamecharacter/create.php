<article>
	<h2>New Character</h2>
	<form action="/gameCharacter/doCreate" method="post" class="col-6">
		<div class="form-group">
		  <label for="name">Character Name</label>
	  	<input id="name" name="name" type="text" class="form-control">
		</div>
		<div class="form-group">
		  <label for="picture_url">Picture Url</label>
	  	<input id="picture_url" name="picture_url" type="text" class="form-control">
		</div>
		<div class="form-group">
		  <label for="weapon">Weapon</label>
	  	<input id="weapon" name="weapon" type="text" class="form-control">
		</div>
		<div class="form-group">
			<label  for="password">Description</label>

			<textarea id="description" name="description" rows="4" cols="50"></textarea>
		</div>
		<div class="form-group">
		<label  for="cstatement">Statement</label>
		<textarea id="cstatement" name="cstatement" rows="4" cols="50"></textarea>
	
		</div >
	

		<button type="submit" class="submit">Create</button>
	</form>
	<a title="Back" href="/" class="orientation">< Back</a>
</article>
<div class="side-img-2"></div>

