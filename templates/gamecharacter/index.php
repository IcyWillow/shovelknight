<article class="hreview open special">
<a title="Back" href="/" class="orientation">< Home</a>

<?php $firstletter = "";?>

	<?php if (empty($gameCharacters)): ?>
		<div>
			<h2 class="item title">Hoopla! No characters found.</h2>
		</div>
	<?php else: ?>
		<?php foreach ($gameCharacters as $gameCharacter): ?>

		<?php
//Show first letters
$temp = strtoupper($gameCharacter->name[0]);
if ($temp != $firstletter) {
    $firstletter = $temp;
    echo "<div class='list-letter-wrapper'><h3 class='list-letter'>{$firstletter}</h3></div>";
}
?>
			<div class="panel panel-default">
				<div class="panel-heading"><h2><?=htmlentities($gameCharacter->name);?></h2></div>
				<img class="miniature" src=<?=htmlentities($gameCharacter->picture_url);?>/>
				<div class="panel-body">
					<p>
					<a title="Show" href="/gameCharacter/show?id=<?=$gameCharacter->id;?>">Show</a>
					<?php foreach ($namesAndCharacters as $item): ?>
						<?php if ($_SESSION['userid'] === $item->username && $gameCharacter->id === $item->gamecharacter_id): ?>
							<a title="Update" href="/gameCharacter/update?id=<?=$gameCharacter->id;?>">Update</a>
							<a title="Delete" href="/gameCharacter/delete?id=<?=$gameCharacter->id;?>">Delete</a>
							<?php $noMatch = false?>
							<?php break;?>
						<?php else: ?>
							<?php $noMatch = true?>
						<?php endif;?>
					<?php endforeach;?>
					<?php if ($noMatch): ?>
						<a title="Update" href="javascript:void(0)" class="disabled">Update</a>
						<a title="Delete" href="javascript:void(0)" class="disabled">Delete</a>
					<?php endif?>
					</p>
				</div>
			</div>
			<hr>
		<?php endforeach;?>
	<?php endif;?>
	<a title="Back" href="/" class="orientation">< Back</a>
	<a title="Back" href="/" class="orientation">Home</a>
</article>
<div class="side-img-character-list"></div>



