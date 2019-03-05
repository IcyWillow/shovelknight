<article class="hreview open special">
	<?php if (empty($gameCharacter)): ?>
		<div class="dhd">
			<h2 class="item title">Unknown character.</h2>
		</div>
	<?php else: ?>
			<div class="panel panel-default">
				<div class="panel-heading"><h2><?=htmlentities($gameCharacter->name);?></h2></div>
				<img class="panel-img" src=<?=htmlentities($gameCharacter->picture_url);?>/>
				<div class="panel-body">
					<p class="description"><strong>Weapon: </strong><?=htmlentities($gameCharacter->weapon);?></a></p>
					<p class="description"><strong>Description: </strong><?=htmlentities($gameCharacter->description);?></a></p>
					<p class="description"><strong>Statement: </strong><i><?=htmlentities($gameCharacter->statement);?></i></a></p>

					 <p class="description"><strong>Created by: </strong><?=$createdby;?></a></p>

					<p class="description"><strong>Created at: </strong><?=date("j. M. Y", strtotime($gameCharacter->created_at));?></p>
					<p class="description"><strong>Last update: </strong><?=date("j. M. Y", strtotime($gameCharacter->updated_at));?></p>
					<p>
					<?php if ($isOwner) {?>
					<a class="orientation" title="Update" href="/gameCharacter/update?id=<?=$gameCharacter->id;?>">Update</a>
					<a class="orientation" title="Delete" href="/gameCharacter/delete?id=<?=$gameCharacter->id;?>">Delete</a>
					<?php } else {?>
						<a title="Update" href="javascript:void(0)" class="disabled">Update</a>
						<a title="Delete" href="javascript:void(0)" class="disabled">Delete</a>
					<?php }?>

					</p>
					<br>

				</div>
			</div>
	<?php endif;?>

	<a title="Back" href="/gameCharacter/index" class="orientation">< Back</a>
</article>
<div class="side-img"></div>
