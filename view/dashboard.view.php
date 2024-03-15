<?php require ('view/partials/head.php');?>  

       	<?php require ('view/partials/nav.php');?>                 
		<?php require ('view/partials/header.php');?>
  <main>
			<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
				<p>Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?>. Welcome to the Dashboard</p>
			</div>
		</main>
		
<?php require ('view/partials/footer.php');?>