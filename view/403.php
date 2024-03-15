<?php require ('view/partials/head.php');?>  

       	<?php require ('view/partials/nav.php');?>                 
  <main>
			<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
				<p>403</p><br>
                <p>Youre not authorized to view this page</p>
				<br>
				<a href="<?=$_SERVER['HTTP_REFERER']?>" class="text-blue-500 underline" = >Go Back</a>
			</div>
		</main>
		
<?php require ('view/partials/footer.php');?>