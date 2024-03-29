
<?php require ('view/partials/head.php');?>

       	<?php require ('view/partials/nav.php');?>                 
		<?php require ('view/partials/header.php');?>
<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

	<ol>
		<?php foreach($notes as $note) : ?>
			<li>
				<a href="/note?id=<?= $note["id"] ?>" class="text-blue-500 hover:underline">
					<?= htmlspecialchars($note["body"] )?>
		</li>
		<?php endforeach; ?>	
		</ol>
		<p class="mt-6">
		<a href="/note-create" class="text-blue-500 hover:underline">Create Note</a>
		</p>
	</div>
</main>

<?php require ('view/partials/footer.php');?>